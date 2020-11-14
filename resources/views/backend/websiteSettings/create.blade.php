@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Setting</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Setting</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Settings</h3>
                    <a href="{{ route('website.setting.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('website.setting.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Site Name</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Site Email</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Site Email">
                                    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Site Logo</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="img-circle" src="{{ asset('backend/image/default-logo.png') }}" id="logo_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                        </div>
                                        <div class="col-4 mt-4">
                                            <input type="file" name="logo_image" autocomplete="image" onchange="document.getElementById('logo_image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-6 mt-4">
                                            @error('logo_image') <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Site Favicon</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="img-circle" src="{{ asset('backend/image/default-logo.png') }}" id="favicon_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                        </div>
                                        <div class="col-4 mt-4">
                                            <input type="file" name="favicon_image" autocomplete="image" onchange="document.getElementById('favicon_image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-6 mt-4">
                                            @error('favicon_image') <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
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

