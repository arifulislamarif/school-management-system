@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary mr-2 btn-sm" href="">General Setting</a>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('profile.edit') }}">Change Password</a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                           Good
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
