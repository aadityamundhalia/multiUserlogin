<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
  public function index()
  {
    return view('admins.users.post');
  }
}
