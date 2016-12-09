<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserQuickBook;
use App\Http\Requests;

use App\Helpers\helpers;
use Datatables, Validator, Redirect;
use Auth;

class QuickBooksController extends Controller
{
    public function __construct()
    {
        $this->home = '/qb';
        $this->helpers = new helpers;
    }
    
	 /**
     * Display saved QuickBooks Info
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Load QuickBook Info
        $QuickBook = UserQuickBook::where('user_id', '=' , Auth::user()->id)
            ->first();

        return view('quickbooks.index',compact('QuickBook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $QuickBook = UserQuickBook::where('user_id', '=' , Auth::user()->id)
            ->first();

        if(!$QuickBook)
        {
            $QuickBook = new UserQuickBook();
        }   

        $QuickBook->user_id = Auth::user()->id;
        $QuickBook->consumer_key = $request->get('consumerkey');
        $QuickBook->consumer_key_secret = $request->get('consumersecretkey');
        $QuickBook->oauth_token = $request->get('token');
        $QuickBook->oauth_token_secret = $request->get('secrettoken');
        $QuickBook->company_id = $request->get('companyId');    
        $QuickBook->save();

        return redirect($this->home);
    }

}