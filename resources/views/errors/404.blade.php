@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
          <div class="centering test-center error-container">
            <div class="text-center">
              <h2 class="without-margin"><span class="text-danger"><big>No page found</big></span></h2>
              <h4 class="text-danger">Looks like we do not have this page.</h4>
              <h4 class="text-danger">404</h4>
            </div>
            <div class="text-center">
              <h3><small>Choose an option below</small></h3>
            </div>
            <hr>
            <ul class="pager">
              <li><a href="/home">Go Back</a></li>
              <li><a href="/">Home Page</a></li>
            </ul>
          </div>
        </div>
      </div>
</div>
@endsection
