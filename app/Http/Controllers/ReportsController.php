<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Client;
use App\Models\Leadsource;
use App\Models\User;
use App\Helpers\helpers;
use Carbon\Carbon;
use DB;

class ReportsController extends Controller
{

    public function __construct()
    {
        $this->helper = new helpers;
    }

    /**
     * Estimators Dashboard
     * Summarizes total signed leads per each estimator AND other info
     */
    public function estdash(Request $request)
    {
        $req = $request->all();

        $qry = Client::select(
            'estimator',
            DB::raw('count(estimator) as total_signed_leads'),
            DB::raw('sum(signed_contract) as total_signed_contract')
        )->groupBy('estimator');

        $qry = $qry->whereIn(
            'status',
            [
                'contract_signed',
                'provided_to_production',
                'in_production',
                'work_started',
                'closed_work_completed'
            ]
        );

        if ($request->estimator) {
            $qry = $qry->whereIn('estimator', $request->estimator);
        }
        if ($request->date) {
            $date = explode("-", $request->date);
            $mnth = $date[0];
            $year = $date[1];
            $qry = $qry->whereMonth('created_at', '=', $mnth);
            $qry = $qry->whereYear('created_at', '=', $mnth);
        }


        $data = $qry->paginate(100);

        $estimator = $this->helper->estimators();

        return view('reports.estdash', compact(['data', 'req', 'estimator']));
    }

    /**
     * Leads dashboard
     * Provide the total records per each lead source...etc
     */
    public function leaddash(Request $request)
    {
        $req = $request->all();

        $data = '';

        $rs = Leadsource::with('clients')->get();
        foreach ($rs as $sngl_ls) {
            $signed = Client::where('lead_source', $sngl_ls->title)->whereIn(
                'status',
                [
                    'contract_signed',
                    'provided_to_production',
                    'in_production',
                    'work_started',
                    'closed_work_completed'
                ]
            )->count();

            $data[] = [
                'title' => $sngl_ls->title,
                'total_leads' => $sngl_ls->clients->count(),
                'signed' => $signed
            ];
        }

        return view('reports.leaddash', compact(['data', 'req']));

    }

    /**
     *  Days To Meet With Client
     *  Provide count of the following records within each of these statuses for each estimator....
     */
    function dmeetclient()
    {
        $data = [];
        $estimators = User::with('clients')->whereHas(
            'role',
            function ($q) {
                $q->where('name', 'Estimator');
            }
        )->get();

        foreach ($estimators as $estimator) {
            $onetofive = 0;
            $fivetoten = 0;
            $tenplus = 0;
            foreach ($estimator->clients as $client) {
                $num = $client->appointment_date - $client->lead_date;
                if ((1 <= $num) && ($num <= 5)) {
                    $onetofive++;
                }
                if ((6 <= $num) && ($num <= 10)) {
                    $fivetoten++;
                }
                if ($num > 10) {
                    $tenplus++;
                }

            }

            $data [] = [
                'name' => $estimator->first_name . ' ' . $estimator->last_name,
                'onetofive' => $onetofive,
                'fivetoten' => $fivetoten,
                'tenplus' => $tenplus
            ];
        }

        return view('reports.days_to_meet_with_client', compact(['data']));
    }

    /**
     *  Days to submit an estimate
     *
     */

    public function dsubestimate()
    {

        $data = [];
        $estimators = User::with('clients')->whereHas(
            'role',
            function ($q) {
                $q->where('name', 'Estimator');
            }
        )->get();

        foreach ($estimators as $estimator) {
            $onetofive = 0;
            $fivetoten = 0;
            $tentotwenty = 0;
            $twentyplus = 0;

            foreach ($estimator->clients as $client) {
                $num = $client->original_est_date - $client->appointment_date;
                if ((1 <= $num) && ($num <= 5)) {
                    $onetofive++;
                }
                if ((6 <= $num) && ($num <= 10)) {
                    $fivetoten++;
                }
                if ((10 <= $num) && ($num <= 20)) {
                    $tentotwenty++;
                }
                if ($num > 20) {
                    $twentyplus++;
                }

            }

            $data [] = [
                'name' => $estimator->first_name . ' ' . $estimator->last_name,
                'onetofive' => $onetofive,
                'fivetoten' => $fivetoten,
                'tentotwenty' => $tentotwenty,
                'twentyplus' => $twentyplus
            ];
        }

        return view('reports.days_to_submit_an_estimate', compact(['data']));
    }

    /**
     * Days to sign contract report
     */
    public function dsigncont()
    {

        $data = [];
        $estimators = User::with('clients')->whereHas(
            'role',
            function ($q) {
                $q->where('name', 'Estimator');
            }
        )->get();

        foreach ($estimators as $estimator) {
            $onetofive = 0;
            $fivetoten = 0;
            $tentotwenty = 0;
            $twentyplus = 0;

            foreach ($estimator->clients as $client) {
                $num = $client->signed_contract_date - $client->original_est_date;
                if ((1 <= $num) && ($num <= 5)) {
                    $onetofive++;
                }
                if ((6 <= $num) && ($num <= 10)) {
                    $fivetoten++;
                }
                if ((10 <= $num) && ($num <= 20)) {
                    $tentotwenty++;
                }
                if ($num > 20) {
                    $twentyplus++;
                }

            }

            $data [] = [
                'name' => $estimator->first_name . ' ' . $estimator->last_name,
                'onetofive' => $onetofive,
                'fivetoten' => $fivetoten,
                'tentotwenty' => $tentotwenty,
                'twentyplus' => $twentyplus
            ];
        }

        return view('reports.days_to_submit_an_estimate', compact(['data']));
    }



    /**
     *  Follow Up dashboard
     *    Provide count of the following records within each of these statuses for each estimator....
     */
    public function fudash(Request $request)
    {
        $req = $request->all();

        $estimators = [];
        $qry = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'Estimator');
            }
        );
        if ($request->estimator && $request->estimator > 0) {
            $qry->where('id', $request->estimator);
        }

        $rs = $qry->get();

        foreach ($rs as $estimator) {
            $id = $estimator->id;

            $total_leads = Client::where('estimator', $id)->whereIn(
                'status',
                [
                    'scheduled_for_estimate',
                    'Estimate_in_progress',
                    'post_est_follow_up',
                    'Estimate_provided',
                    'waiting_for_client'
                ]
            )->count();


            $scheduled_for_estimate = Client::where('estimator', $id)->where('status', 'scheduled_for_estimate')->count(
            );

            $Estimate_in_progress = Client::where('estimator', $id)->where('status', 'Estimate_in_progress')->count();

            $post_est_follow_up = Client::where('estimator', $id)->where('status', 'post_est_follow_up')->count();

            $Estimate_provided = Client::where('estimator', $id)->where('status', 'Estimate_provided')->count();

            $waiting_for_client = Client::where('estimator', $id)->where('status', 'waiting_for_client')->count();

            $estimators [] = [
                'name' => $estimator->first_name . ' ' . $estimator->last_name,
                'total' => $total_leads,
                'scheduled_for_estimate' => $scheduled_for_estimate,
                'Estimate_in_progress' => $Estimate_in_progress,
                'post_est_follow_up' => $post_est_follow_up,
                'Estimate_provided' => $Estimate_provided,
                'waiting_for_client' => $waiting_for_client
            ];

        }

        $estimatordd = ['0' => 'All'] + $this->helper->estimators();


        return view(
            'reports.fudash',
            compact(
                [
                    'estimators',
                    'req',
                    'estimatordd'
                ]
            )
        );

    }

    /**
     *  Production dashboard
     */
    public function prddash()
    {
        $data = '';

        return view('reports.prddash', compact(['data']));

    }

    /**
     *  Completed Jobs dashboard
     *  Display all the jobs with closed – work completed status
     */
    public function cpjdash()
    {
        $data = Client::where('status', 'closed_work_completed')->paginate(100);

        return view('reports.cpjdash', compact(['data']));

    }

}
