<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Helpers\helpers;
use Auth,Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    /* public function __construct()
     {
         if(!\Request::is('login')) {
             $this->home = '/clients';
             $this->helpers = new helpers;

             $this->middleware(function ($request, $next) {
                 $this->user = Auth::user();
                 foreach($this->user->permissions as $permission) {
                     $permissions[] = $permission->name;
                 }


                 //    session(['permissions' => $permissions]);



                 return $next($request);
             });
         }

    } */
}
