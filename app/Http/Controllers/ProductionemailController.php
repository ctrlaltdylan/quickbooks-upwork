<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productionemail;
use App\Http\Requests;

use App\Helpers\helpers;
use Datatables, Validator, Redirect;

class ProductionemailController extends Controller
{

    public function __construct()
    {
        $this->home = '/pe';
        $this->helpers = new helpers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Productionemail::create($request->all());

        $this->helpers->saveAudit([
            'page'=>'Production Email',
            'action'=>'Added - '.$request->email,
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
        $pe = Productionemail::find($id);
        return view('pemail.edit', compact(['pe']));
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
        $ls = Productionemail::find($id);
        $ls->email = $request->email;
        $ls->save();

        $this->helpers->saveAudit([
            'page'=>'Production Email',
            'action'=>'Edit - '.$request->email,
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
        $client = Productionemail::get();
        $obj = Datatables::of($client);
        $obj->addColumn(
            'action',
            function ($class) {
                return '<a href="' . url('/pe/' . $class->id . '/edit/') . '" class="btn btn-success btn-circle">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>';
            }
        );

        return $obj->make(true);

    }
}
