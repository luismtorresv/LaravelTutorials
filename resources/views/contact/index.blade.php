@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead">Email: <a href="mailto:sysadmin@example.com">sysadmin@example.com</a></p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead">Address: 221B Baker Street</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead">Phone number: 202-456-1111</p>
            </div>
        </div>
    </div>
@endsection
