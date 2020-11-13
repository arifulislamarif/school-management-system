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
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center">
                        @if (Auth::user()->image)
                        <img id="image" class="profile-user-img img-fluid img-circle"" src=" {{ asset(Auth::user()->image) }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:150px;width:150px">
                        @else
                        <img id="image" class="img-circle" src="{{ asset('backend/image/default.png') }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:150px;width:150px">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->role ?? 'Web Developer' }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email Address</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Registation At</b> <a class="float-right">{{ $user->created_at->format('j M, Y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Profile Update At</b> <a class="float-right">{{ $user->created_at->format('j M, Y') }}</a>
                        </li>
                    </ul>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <a href="{{ route('setting') }}" class="btn btn-primary btn-block mb-3"><b>Go To Settings </b><i class="fa fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
