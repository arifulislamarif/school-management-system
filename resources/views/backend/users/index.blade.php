@extends('layouts.admin')
@section('title') Users List @endsection
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

@php
$userr = Auth::user();
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">Users List</h3>
                @if (Auth::user()->can('admin.create'))
                    <a href="{{ route('user.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Create User</a>
                @endif
              </div>
              <div class="card-body">
                <table class="table table-bordered text-center mb-3">
                  <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="28%">Name</th>
                      <th width="28%">Email</th>
                      <th width="24%">Roles</th>
                       @if ($userr->can('admin.edit') || $userr->can('admin.delete'))
                      <th width="15%">Action</th>
                       @endif
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($users) != 0)
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
                                @if ($userr->can('admin.edit') || $userr->can('admin.delete'))
                                <td class="text-center">
                                    @if ($userr->can('admin.edit'))
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if ($userr->can('admin.delete'))
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center">Nothing Found.</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                {{ $users->links() }}
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
