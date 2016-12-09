<?php

/**
 * Email Templates Controller
 */
namespace App\Http\Controllers;


use App\Models\Variable;
use App\Models\EmailTemplate;
use App\Helpers\helpers;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

/**
 * Class EmailTemplateController
 * @package App\Http\Controllers
 */
class EmailTemplateController extends Controller
{
   
  public function __construct()
    {
        $this->home = '/emailtpls';
        $this->helpers = new helpers;
    }
   
    /**
     * List EmailTemplates
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
		$mailtpl = EmailTemplate::get();
        return view('mailtpl.index')->with(['mailtpl' => $mailtpl]);
    }
	
	public function create(){
		$variables = Variable::get();
        return view('mailtpl.create')->with(['variables' => $variables]);
	}

 /**
     * Store new tpl to DB and redirect to templates list with success message
     *
     * @param Request $request
     * @return RedirectResponse
     */	
    public function store(Request $request)
    {
        $tpl = EmailTemplate::create(
            $request->all()
        );

        $this->helpers->saveAudit([
            'page'=>'Email Template',
            'action'=>'Added - '.$request->template_name,
        ]);

        return redirect( $this->home)->with(['alert-success' => 'Email Template ' . $tpl->name . ' added successfully.']);
    }
	
	    /**
     * Return view for emailtemplate editing
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        
		$tpl = EmailTemplate::find($id);
		$variables = Variable::get();
        return view('mailtpl.edit')->with(['tpl' => $tpl,'variables'=>$variables]);
    }
	
	    /**
     * Save updated role to DB
     *
     * @param $id
     * @param RoleEditRequest $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $tpl = EmailTemplate::find($request->id);
        $tpl->update($request->all());

        $this->helpers->saveAudit([
            'page'=>'Email Template',
            'action'=>'Edit - '.$request->template_name,
        ]);

        return redirect($this->home)->with(['success' => 'Template ' . $tpl->name . ' updated successfully.']);
    }
	
}