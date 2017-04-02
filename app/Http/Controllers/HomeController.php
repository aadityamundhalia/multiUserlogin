<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\User;

use View;

class HomeController extends Controller
{
  public function index()
  {
    $users = DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.display_name')
            ->get();
    //echo $users;
    return View::make('admins.users.home', compact('users'));
  }
  
  public function show($id)
    {
      $users = User::find($id);
      //echo $users;
      return View::make('show', compact('users'));
    }
    
   public function create()
    {
      return Redirect::route('home.index');
    }
}
