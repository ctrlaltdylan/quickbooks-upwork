<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leadsource;
use App\Http\Requests;

use App\Helpers\helpers;
use Datatables, Validator, Redirect;

class LeadsourceController extends Controller
{

    public function __construct()
    {
        $this->home = '/ls';
        $this->helpers = new helpers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leadsource.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leadsource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Leadsource::create($request->all());

        $this->helpers->saveAudit([
            'page'=>'Lead Source',
            'action'=>'Added - '.$request->title,
        ]);

        return redirect($this->home);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ls = Leadsource::find($id);
        return view('leadsource.edit', compact(['ls']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ls = Leadsource::find($id);
        $ls->title = $request->title;
        $ls->save();

        $this->helpers->saveAudit([
            'page'=>'Lead Source',
            'action'=>'Update - '.$request->title,
        ]);
        return redirect($this->home);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $client = Leadsource::get();
        $obj = Datatables::of($client);
        $obj->addColumn(
            'action',
            function ($class) {
                return '<a href="' . url('/ls/' . $class->id . '/edit/') . '" class="btn btn-success btn-circle">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>';
            }
        );

        return $obj->make(true);

    }
}
