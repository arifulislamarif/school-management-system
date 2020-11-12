@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Roles</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Roles</li>
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
                    <h3 class="card-title" style="line-height: 36px;">Create Role</h3>
                    <a href="{{ route('role.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form role="form" action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role_name">Role Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="role_name" placeholder="Enter Role Name">
                                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Permission</label> <br>


                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="permission_all" value="1">
                                        <label for="permission_all" class="custom-control-label">All</label>
                                    </div><hr>
                                    @php $i=1; @endphp
                                    @foreach ($permission_groups as $group)
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="{{ $i }}management" onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)" value="2">
                                                    <label for="{{ $i }}management" class="custom-control-label text-capitalize">{{ $group->name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                                @php
                                                    $permissionss = App\Models\User::getpermissionsByGroupName($group->name);
                                                    $j = 1;
                                                @endphp
                                                @foreach ($permissionss as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input name="permissions[]" class="custom-control-input" type="checkbox" id="permission_checkbox_{{ $permission->id }}" value="{{ $permission->name }}">
                                                    <label for="permission_checkbox_{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                                </div>
                                                @php $j++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                        @php $i++; @endphp
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
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

@section('script')
    <script>
        $('#permission_all').click(function(){
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked',true);
            }else{
                // uncheck all the checkbox
                $('input[type=checkbox]').prop('checked',false);
            }
        });

        // check permission by group
        function CheckPermissionByGroup(classname,checkthis){
            const groupIdName = $("#"+checkthis.id);
            const classCheckBox = $('.'+classname+' input');
            if (groupIdName.is(':checked')) {
                // check all the checkbox
                classCheckBox.prop('checked',true);
            }else{
                // uncheck all the checkbox
                classCheckBox.prop('checked',false);
            }
        }
    </script>
@endsection
