@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Users</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
                <h3 class="card-title" style="line-height: 36px;">Users List</h3>
                <a href="{{ route('user.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Create User</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered text-center mb-3">
                  <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="28%">Name</th>
                      <th width="28%">Email</th>
                      <th width="24%">Roles</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->index+1 }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            @foreach ($user->roles as $role)
                                <span class="badge badge-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $users->links() }}
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
