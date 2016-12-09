<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleEditRequest;
use App\Models\Role;
use App\Http\Requests\Role\RoleCreateRequest;
use Illuminate\Http\RedirectResponse;
use App\Helpers\helpers;


/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    public function __construct()
    {
        $this->helpers = new helpers;
    }
    /**
     * List Roles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all(['id', 'name', 'description', 'color', 'status']);

        return view('role.index')->with(['roles' => $roles]);
    }

    /**
     * Return view for create role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store new role to DB and redirect to role list with success message
     *
     * @param RoleCreateRequest $request
     * @return RedirectResponse
     */
    public function store(RoleCreateRequest $request)
    {
        $this->validate($request, [
           $request->rules()
        ]);

        $role = Role::create(
            $request->all()
        );

        $this->helpers->saveAudit([
            'page'=>'User Role',
            'action'=>'Added - '.$request->name,
        ]);
        return redirect()->route('admin.role.list')->with(['alert-success' => 'Role ' . $role->name . ' added successfully.']);
    }

    /**
     * Return view for role editing
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->firstOrFail(['id', 'name', 'description', 'color', 'status']);

        return view('role.edit')->with(['role' => $role]);
    }

    /**
     * Save updated role to DB
     *
     * @param $id
     * @param RoleEditRequest $request
     * @return RedirectResponse
     */
    public function update($id, RoleEditRequest $request)
    {
        $role = Role::where('id', $id)->firstOrFail(['id', 'name', 'description', 'color', 'status']);

        $role->name         = $request->get('name');
        $role->description  = $request->get('description');
        $role->color        = $request->get('color');
        $role->status       = $request->get('status');

        $role->save();

        $this->helpers->saveAudit([
            'page'=>'User Role',
            'action'=>'Edit - '.$request->name,
        ]);

        return redirect()->route('admin.role.list')->with(['success' => 'Role ' . $role->name . ' updated successfully.']);
    }
}