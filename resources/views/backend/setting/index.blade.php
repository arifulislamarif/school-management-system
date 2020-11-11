@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Setting</h1>
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
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">General Setting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Change Password</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="tab-content">
                            <div class="tab-pane active" id="gen_settings">
                                <div class="text-center mb-4">
                                    <img width="150px" height="150px" id="image" class="img-circle"
                                        src="{{ asset('backend/image/profile.jpg') }}" alt="User profile picture"
                                        style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                </div>
                                <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT"> <input type="hidden" name="_token"
                                        value="bnnuLgQ8xgmKeLBmnMw7bB1XJhjYaqjwI5FbcM3J">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" value="Zakir Soft" type="text" class="form-control "
                                                placeholder="Enter New Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input name="email" value="web.zakirbd@gmail.com" type="email"
                                                class="form-control " placeholder="Enter New Email">
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
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input name="current_password" type="password" class="form-control "
                                                placeholder="Enter Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input name="password" type="password" class="form-control "
                                                placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input name="password_confirmation" type="password" class="form-control "
                                                placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i>
                                                Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="tab-content">
                            <div class="tab-pane" id="gen_settings">
                                <div class="text-center mb-4">
                                    <img width="150px" height="150px" id="image" class="img-circle"
                                        src="http://127.0.0.1:8000/modules/user/dist/img/default.png"
                                        alt="User profile picture"
                                        style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                                </div>
                                <form class="form-horizontal" action="http://127.0.0.1:8000/settings/update/1"
                                    method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT"> <input type="hidden" name="_token"
                                        value="bnnuLgQ8xgmKeLBmnMw7bB1XJhjYaqjwI5FbcM3J">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" value="Zakir Soft" type="text" class="form-control "
                                                placeholder="Enter New Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input name="email" value="web.zakirbd@gmail.com" type="email"
                                                class="form-control " placeholder="Enter New Email">
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
                                            <button type="submit" class="btn btn-warni"><i class="fas fa-sync"></i>
                                                Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal" action="http://127.0.0.1:8000/settings/password/1"
                                    method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="bnnuLgQ8xgmKeLBmnMw7bB1XJhjYaqjwI5FbcM3J">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input name="current_password" type="password" class="form-control "
                                                placeholder="Enter Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input name="password" type="password" class="form-control "
                                                placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input name="password_confirmation" type="password" class="form-control "
                                                placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-info"><i class="fas fa-sync"></i>
                                                Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
