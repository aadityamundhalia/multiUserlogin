@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @role(('admin'))
                    <p align="right"><a class="btn btn-primary btn-s" href="{{ action('HomeController@create') }}">Create User</a></p>
                  @endrole
                    <table class="table">
                        <tbody>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Role</td>
                          <td>Action</td>
                        </tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->display_name }}</td>
                            <td>
                              <p><a class="btn btn-primary btn-s" href="{{ action('HomeController@edit', [$user->id]) }}">Edit</a> | <a class="btn btn-info btn-s" href="{{ action('HomeController@show', [$user->id]) }}">Show</a></p>
                              <form action="{{ action('HomeController@destroy', [$user->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-s">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
