
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
          <a class="btn btn-outline-primary btn-sm" href="#">Change Password</a>
          </div>
          <div class="card-body">
              <div class="row justify-content-center">
                  <div class="col-md-6">
                      <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                            <div class="text-center">
                              <img width="80px" class="profile-user-img img-fluid img-circle" src="{{ asset('backend/image/profile.jpg') }}" alt="User profile picture">
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

                            {{-- {{ route('user.edit', $user->id) }} --}}
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                          </div>
                      <!-- /.card-body -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection

