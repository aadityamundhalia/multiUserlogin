@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  @include('common.errors')
                    <form action="{{ action('PermissionController@store') }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <div class="row">
                        <div class="col-md-4">
                          <label for="name">Name</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="display_name">display_name</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name') }}">
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="description">description</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="description" id="description" class="form-control">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table">
                      <tbody>
                        <th>Name</th>
                        <th>Display_name</th>
                        <th>Description</th>
                      </tbody>
                      @foreach ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->display_name }}</td>
                          <td>{{ $permission->description }}</td>
                        </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
