<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use App\User;

use App\Role;

use View;

use Validator;

use Redirect;

use HasRole;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('role:admin');
    }

    public function index()
    {
        //$users = User::orderBy('created_at', 'des')->get();
        $users = DB::table('users')
                ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.display_name')
                ->get();
        //echo $users;
        return View::make('home', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('created_at', 'des')->get();
        return View::make('admins.users.create', compact('roles'));
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
        //print_r($input);
        $role_id = $input['role'];
        $validation = Validator::make($input, [
          'name' => 'required|max:255',
          'avatar' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'logo' => 'required|max:255',
          'company' => 'required|max:255',
          'certificate' => 'required|max:255',
          'role' => 'required|max:255',
          'password' => 'required|min:6|confirmed',
        ]);
        if ($validation->fails()) {
            return Redirect::route('user.create')
                    ->withInput()
                    ->withErrors($validation);
        }
        else {

          $users = User::create([
              'name' => $input['name'],
              'avatar' => $input['avatar'],
              'email' => $input['email'],
              'logo' => $input['logo'],
              'company' => $input['company'],
              'certificate' => $input['certificate'],
              'password' => bcrypt($input['password']),
          ]);

          $user = User::orderBy('created_at', 'desc')->first();
          $role = Role::find($role_id);
          $user->attachRole($role);

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
      $users = User::find($id);
      //echo $result;
      return View::make('admins.users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::find($id);
      $roles = Role::get();
      if(is_null($users))
      {
        return Redirect::route('admins.users.home');
      }
      else {
        return View::make('admins.users.edit', compact('users', 'roles'));
      }
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
        $input = Input::all();
        //print_r($input);
        $role_id = $input['role'];
        $user = User::find($id);
        User::find($id)->delete();
        
        $users = User::create([
              'name' => $input['name'],
              'avatar' => $input['avatar'],
              'email' => $input['email'],
              'logo' => $input['logo'],
              'company' => $input['company'],
              'certificate' => $input['certificate'],
              'password' => bcrypt($input['password']),
        ]);

        $user = User::orderBy('created_at', 'desc')->first();
        $role = Role::find($role_id);
        $user->attachRole($role);
        return Redirect::route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::find($id)->delete();
      return Redirect::route('home.index');
    }
}
