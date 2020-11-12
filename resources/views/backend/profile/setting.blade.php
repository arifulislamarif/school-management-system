@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile Setting</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile Setting</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- Card  --}}
<div class="card">
    <div class="card-header">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                aria-controls="nav-home" aria-selected="true">General Setting</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                aria-controls="nav-profile" aria-selected="false">Changes Password</a>
        </div>
    </div>

    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="tab-pane active" id="gen_settings">
                            <div class="text-center mb-4">
                                @if (Auth::user()->image)
                                <img width="150px" height="150px" id="image" class="img-circle" src="{{ asset(Auth::user()->image) }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                            @else
                                <img width="150px" height="150px" id="image" class="img-circle" src="{{ asset('backend/image/defult.png') }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                            @endif
                                {{-- <img width="150px" height="150px" id="image" class="img-circle"
                                    src="{{ asset('backend/image/profile.jpg') }}" alt="User profile picture"
                                    style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;"> --}}
                            </div>
                        <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                               @method('PUT')
                               @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter New Name">
                                            @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                    <input name="email" value="{{ Auth::user()->email }}" type="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Enter New Email">
                                            @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Change Image</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input name="image" autocomplete="image"
                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-sync"></i>
                                            Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2nd Tab --}}
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form class="form-horizontal" action="{{ route('profile.password.update',  Auth::user()->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter Current Password">
                                    @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password">
                                    @error('password_confirmation') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-sync"></i> Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
