<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Permission;

use App\Role;

use View;

use Validator;

use Redirect;

class PermissionController extends Controller
{
    public function __construct()
    {
      $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions =Permission::orderBy('created_at', 'des')->get();
      return View::make('admins.permissions.create', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::orderBy('created_at', 'des')->get();
      $roles = Role::orderBy('created_at', 'des')->get();
      return View::make('admins.permissions.attach', compact('roles', 'permissions'));
    }

    public function attach(Request $request)
    {
      $input = Input::all();
      print_r($input);
      $role = Role::find($input['role']);
      $permission = Permission::find($input['permission']);
      $role->attachPermissions([$permission]);
      echo "<br>";
      echo $role;
      echo "<br>";
      echo $permission;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $validation = Validator::make($input, [
          'name' => 'required|max:255|unique:roles',
          'display_name' => 'required|max:255',
          'description' => 'required|max:255',
        ]);
        if ($validation->fails()) {
            return Redirect::route('permission.index')
                    ->withInput()
                    ->withErrors($validation);
        }
        else {

          $permissions = Permission::create($input);
          return Redirect::route('home.index');
        }
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
        //
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
        //
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
}
