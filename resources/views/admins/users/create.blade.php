@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  @include('common.errors')
                    <form action="{{ action('UserController@store') }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <div class="row">
                        <div class="col-md-4">
                          <label for="name">Name</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="name" id="name" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <label for="avatar">Avatar</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="avatar" id="avatar" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      

                      <div class="row">
                        <div class="col-md-4">
                          <label for="email">Email</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="email" id="email" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <label for="logo">Logo</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="logo" id="logo" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <label for="company">Company</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="company" id="company" class="form-control">
                        </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <label for="certificate">Certificate</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="certificate" id="certificate" class="form-control">
                        </div>
                      </div>
                      
                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="role">Role</label>
                        </div>
                        <div class="col-md-4">
                          <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="password">Password</label>
                        </div>
                        <div class="col-md-4">
                          <input type="password" name="password" id="password" class="form-control">
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="rePassword">Re Password</label>
                        </div>
                        <div class="col-md-4">
                          <input type="password" name="password_confirmation" id="rePassword" class="form-control">
                        </div>
                      </div>

                      <br>
                      <!-- Add Task Button -->
                      <div class="row">
                        <div class="col-md-8 pull-right">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-pencil"></i> Create
                            </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection