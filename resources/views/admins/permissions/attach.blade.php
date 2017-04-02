@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  @include('common.errors')
                    <form action="{{ action('PermissionController@attach') }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <table class="table">
                        <tr>
                          <th>Role</th>
                          <th>Permission</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                          <td>
                            <select name="role" id="role" class="form-control">
                              @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                              @endforeach
                            </select>
                          </td>
                          <td>
                            <select name="permission" id="role" class="form-control">
                              @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                              @endforeach
                            </select>
                          </td>
                          <td>
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-pencil"></i> Attach
                            </button>
                          </td>
                        </tr>
                      </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
