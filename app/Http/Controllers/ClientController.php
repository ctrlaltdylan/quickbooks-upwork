<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Models\Client;
use App\Models\Productionemail;
use App\Helpers\helpers;

use Datatables, Validator, Redirect, Input,Auth;

class ClientController extends Controller
{

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'address1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'scope' => 'required'
    ];

    public function __construct()
    {
        $this->home = '/clients';
        $this->helpers = new helpers;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qry = Client::select('*');
        $qry->where('id', '>', '0');

        if ($request->input('name')) {
            $qry->where(
                function ($qry) use ($request) {
                    $qry->where('first_name', 'like', '%' . $request->input('name') . '%')
                        ->orWhere('last_name', 'like', '%' . $request->input('name') . '%');
                }
            );

        }

        if ($request->input('address')) {
            $qry->where(
                function ($qry) use ($request) {
                    $qry->where('city', $request->input('address'))
                        ->orWhere('state', $request->input('address'))
                        ->orWhere('zip', $request->input('address'));
                }
            );

        }//address

        if ($request->input('phone')) {
            $qry->where('phone', $request->input('phone'));
        }

        if(Auth::user()->permissions->contains(5)&&Auth::user()->role_id!=1) {
            $qry->where('status', 'in_production');
        } else {
             if ($request->input('status')) {
             $qry->where('status', $request->input('status'));
             }
        }

        if ($request->input('lead_type')) {
            $qry->where('lead_type', $request->input('lead_type'));
        }

        if ($request->input('estimator')) {
            $qry->where('estimator', $request->input('estimator'));
        }

        if ($request->input('lead_source')) {
            $qry->where('lead_source', $request->input('lead_source'));
        }

        if ($request->date) {
            $date = explode("-", $request->date);
            $mnth = $date[0];
            $year = $date[1];
            $qry = $qry->whereMonth('lead_date', '=', $mnth);
        }


        if ($request->input('job')) {
            $qry->where('id', $request->input('job'));
        }

        $clients = $qry->paginate(10000);
        $req = $request->all();
        $data = $this->_clientdata(true);

        $data['clients'] = $clients;
        $data['req'] = $req;

        return view('clients.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->_clientdata();

        return view('clients.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_updateRules($request);
        $validator = Validator::make($request->all(), $this->rules);

        $validator->after(
            function ($validator) use ($request) {
                if ($request->status == 'New' && $request->appointment_date != '') {
                    $validator->errors()->add('status', 'Appointment is scheduled. Status cannot be set to New.');
                }
            }
        );

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $data = $this->formatDate($request);
            Client::create($data);
        }
        $this->helpers->saveAudit(
            [
                'page' => 'Client',
                'action' => 'Added - ' . $data['first_name'] . ' ' . $data['last_name'],
            ]
        );

        return redirect($this->home);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $data = $this->_clientdata();
        $data['client'] = $client;

        return view('clients.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $data = $this->_clientdata();
        $data['client'] = $client;

        return view('clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $this->_updateRules($request);

        $validator = Validator::make($request->all(), $this->rules);
        $validator->after(
            function ($validator) use ($request) {
                if ($request->status == 'New' && $request->appointment_date != '') {
                    $validator->errors()->add('status', 'Appointment is scheduled. Status cannot be set to New.');
                }
            }
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = $this->formatDate($request);

            $status = $request->status;

            if ($status == 'scheduled_for_estimate' && $client->status != 'scheduled_for_estimate') {
                $this->sendEmail('sfe', $request);
            }

            if ($client->status == 'scheduled_for_estimate') {
                if ($client->appointment_date != $data['appointment_date'] || $client->appointment_time != $data['appointment_time']) {
                    $this->sendEmail('apptchng', $request);
                }
            }

            if ($status == 'provided_to_production') {
                $this->sendPtP($request->all());
            }


            $client->update($data);
            $this->helpers->saveAudit(
                [
                    'page' => 'Client',
                    'action' => 'Edit - ' . $data['first_name'] . ' ' . $data['last_name'],
                ]
            );

            return redirect($this->home);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Data For data table
     */
    public function data()
    {
        $client = Client::get();
        $obj = Datatables::of($client);
        $obj->addColumn(
            'action',
            function ($class) {
                return '<a href="' . url('/clients/' . $class->id . '/edit/') . '" class="btn btn-success btn-circle">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>';
            }
        );

        return $obj->make(true);

    }

    public function formatDate($request)
    {
        $data = $request->all();
        $data['lead_date'] = ($data['lead_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['lead_date']))
        ) : null;

        $data['original_est_date'] = ($data['original_est_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['original_est_date']))
        ) : null;
        $data['appointment_date'] = ($data['appointment_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['appointment_date']))
        ) : null;
        $data['signed_contract_date'] = ($data['signed_contract_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['signed_contract_date']))
        ) : null;

        $data['start_date'] = ($data['start_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['start_date']))
        ) : null;
        $data['handover_date'] = ($data['handover_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['handover_date']))
        ) : null;


        $data['given_to_prod_date'] = ($data['given_to_prod_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['given_to_prod_date']))
        ) : null;

        $data['original_projected_end_date'] = ($data['original_projected_end_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['original_projected_end_date']))
        ) : null;

        $data['adjusted_end_date'] = ($data['adjusted_end_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['adjusted_end_date']))
        ) : null;

        $data['actual_end_date'] = ($data['actual_end_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['actual_end_date']))
        ) : null;

        $data['follow_up_date'] = ($data['follow_up_date'] != '') ? date(
            'Y-m-d',
            strtotime(str_replace('-', '/', $data['follow_up_date']))
        ) : null;

        $data['days_till_meeting'] = intval($data['days_till_meeting']);
        $data['days_till_submitting_est'] = intval($data['days_till_submitting_est']);
        $data['days_till_contract_signed'] = intval($data['days_till_contract_signed']);


        return $data;
    }


    public function _clientdata($add_default = false)
    {
        $status = ($add_default) ? array('' => 'All') + $this->helpers->status() : $this->helpers->status();
        $lead_type = ($add_default) ? array('' => 'All') + $this->helpers->leadtype() : $this->helpers->leadtype();
        $lead_source = ($add_default) ? ['' => 'All'] + $this->helpers->leadsource()->toArray(
            ) : $this->helpers->leadsource()->toArray();
        $estimators = ($add_default) ? array('' => 'All') + $this->helpers->estimators() : $this->helpers->estimators();

        return compact(['lead_type', 'lead_source', 'estimators', 'status']);
    }

    protected function _updateRules($request)
    {
        $status = $request->status;

        if ($status == 'scheduled_for_estimate') {
            $this->rules['estimator'] = 'required';
            $this->rules['appointment_date'] = 'required';
            $this->rules['appointment_time'] = 'required';
        }

        if ($status == 'in_production') {
            $this->rules['handover_date'] = 'required';
        }

        if ($status == 'work_started') {
            $this->rules['start_date'] = 'required';
            $this->rules['original_projected_end_date'] = 'required';
            $this->rules['job_foreman'] = 'required';
        }

        if ($status == 'closed_work_completed') {
            $this->rules['actual_end_date'] = 'required';
            $this->rules['total_job_expenses'] = 'required';
            $this->rules['job_foreman'] = 'required';
        }
        if ($status == 'contract_signed') {
            $this->rules['signed_contract_date'] = 'required';
            $this->rules['signed_contract'] = 'required';
        }
        if ($status == 'Estimate_provided') {
            $this->rules['estimate'] = 'required';
            $this->rules['original_est'] = 'required';
            $this->rules['original_est_date'] = 'required';
        }


    }

    protected function sendPtP($data)
    {
        $data['estimator_details'] = User::find($data['estimator'])->toArray();

        $peemails = Productionemail::all();
        foreach ($peemails as $rs) {
            $email = $rs->email;
            /*Mail::send(
                'emails.provided_to_production',
                $data,
                function ($message, $email) {
                    $message->from('site@gmail.com', 'Support');
                    $message->to($email);
                }
            );*/
        }
    }

    protected function sendEmail($type, $request)
    {
        $estimator = User::find($request->estimator);
        $data = [
            'estimator_name' => $estimator->first_name . " " . $estimator->last_name,
            'client_name' => $request->first_name . " " . $request->last_name,
            'address' => $request->address1,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'scope' => $request->scope,
            'lead_source' => $request->lead_source,
            'phone_number' => $request->phone,
            'email' => $request->email
        ];

        //Schedule for estimate
        $tpl = 'emails.' . $type;

        $email = $estimator->email;
        /* Mail::send(
             $tpl,
             $data,
             function ($message, $email) {
                 $message->from('site@gmail.com', 'Support');
                 $message->to($email);
             }
         );*/
    }

}
