@extends('layouts.admin')
@section('title') Site Settings @endsection
@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Settings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        @foreach ($site_settings as $setting)
                            <form class="form-horizontal" action="{{ route('website.setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Site Name</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $setting->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                                        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Site Email</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $setting->email }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Site Email">
                                        @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Site Logo</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-2">
                                                @if (file_exists($setting->logo_image))
                                                    <img class="img-circle" src="{{ asset($setting->favicon_image) }}" id="logo_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @else
                                                    <img class="img-circle" src="{{ asset('backend/image/logo-default.png') }}" id="logo_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @endif
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
                                                @if (file_exists($setting->favicon_image))
                                                    <img class="img-circle" src="{{ asset($setting->logo_image) }}" id="favicon_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @else
                                                    <img class="img-circle" src="{{ asset('backend/image/logo-default.png') }}" id="favicon_image" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                                @endif
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
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

