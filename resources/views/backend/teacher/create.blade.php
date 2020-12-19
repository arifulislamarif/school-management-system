@extends('layouts.admin')
@section('title') Teacher Add | Users @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Teacher Add</h3>
                    <a href="{{ route('teacher.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-2">
                        <form class="form-horizontal" action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('password') }}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                    @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input name="image" autocomplete="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('image') <span class="text-danger invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('phone') }}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone">
                                    @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Depertment</label>
                                <div class="col-sm-9">
                                    <select name="depertment_id" class="select2bs4 @error('depertment_id') is-invalid @enderror" style="width: 100%;">
                                        <option value="">Select Depertment</option>
                                        @foreach ($depertments as $depertment)
                                            <option value="{{ $depertment->id }}">{{ $depertment->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('depertment_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-6">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input value="1" type="radio" id="radioPrimary1" name="gender">
                                            <label for="radioPrimary1">Male</label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input value="2" type="radio" id="radioPrimary2" name="gender">
                                            <label for="radioPrimary2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                 <textarea name="address" class="form-control" rows="10" placeholder="Enter address of doctor....">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="text-center  mt-5">
                            <img width="150px" height="150px" id="image" src="{{ asset('backend/image/default.png') }}" alt="User profile picture" style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('style')
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <style>
        .select2-results__option[aria-selected=true] {
            display: none;
        }
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
  </style>
@endsection

@section('script')
<script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
@endsection
