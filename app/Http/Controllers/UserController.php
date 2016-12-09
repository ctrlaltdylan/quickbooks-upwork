<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserEditRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Helpers\helpers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserCreateRequest;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    public function __construct()
    {
        $this->helpers = new helpers;
    }

    /**
     * List Users with filter
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = User::query();

        if($request->has('status'))
        {
            $query->where('status', $request->get('status'));
        }

        $users = $query->paginate(15);

        return view('user.index')->with(['users' => $users]);
    }

    /**
     * Return view for create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('status', 'active')->get(['id', 'name']);

        $permissions = Permission::where('status', 'active')->get(['id', 'description']);

        return view('user.create')->with(['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Store new user to DB and redirect to user list with success message
     *
     * @param UserCreateRequest $request
     * @return RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        // dd($request->get('permissions'));

        $user = User::create(
            $request->all()
        );
        $this->helpers->saveAudit([
            'page'=>'User',
            'action'=>'Added - '.$request->first_name." ".$request->last_name,
        ]);
        $user->permissions()->attach($request->get('permissions'));



        return redirect()->route('admin.user.list')->with(['success' => 'User ' . $user->first_name . ' added successfully.']);
    }

    /**
     * Return view for user editing
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $roles = Role::where('status', 'active')->get(['id', 'name']);

        $permissions = Permission::where('status', 'active')->get(['id', 'description']);

        // dd($user->getPermissionsIdsAttribute());

        return view('user.edit')->with(['user' => $user, 'roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Save updated user to DB
     *
     * @param $id
     * @param UserEditRequest $request
     * @return RedirectResponse
     */
    public function update($id, UserEditRequest $request)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->update($request->all());

        $user->permissions()->detach();
        $user->permissions()->attach($request->get('permissions'));

        $this->helpers->saveAudit([
            'page'=>'User',
            'action'=>'Edit - '.$request->first_name." ".$request->last_name,
        ]);

        return redirect()->route('admin.user.list')->with(['success' => 'User ' . $user->first_name . ' updated successfully.']);
    }
}