@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $users->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                    <img alt="User Pic" src="{{ $users->avatar }}" class="img-circle img-responsive"> 
                    <hr>
                    <img alt="User Pic" src="{{ $users->logo }}" class="img-circle img-responsive">
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email:</td>
                        <td><a href="{{ $users->email }}">{{ $users->email }}</a></td>
                      </tr>
                      <tr>
                        <td>Company:</td>
                        <td>{{ $users->company }}</td>
                      </tr>
                      <tr>
                        <td>Certificate</td>
                        <td>{{ $users->certificate }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
