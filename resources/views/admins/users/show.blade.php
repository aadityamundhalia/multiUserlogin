@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Entity</td>
                        </tbody>
                          <tr>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->display_name }}</td>
                          </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
