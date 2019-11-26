@extends('admin/layouts/app')
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{route('role.index')}}" class="btn btn-info mb-2">Go Back</a>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Role Info</h4>
                    <form id="role_form" action="{{route('role.update',$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Role Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="roletitle" name="roletitle" placeholder="role Title" value="{{$role->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="col-sm-2 text-right control-label ">Post</label>
                                    <div class="col-sm-10">
                                        @foreach ($permissions as $permission)
                                        @if($permission->pfor === 'post')
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 {{$permission->id}}" name="permission_r[]" value="{{$permission->id}}"> <label class="custom-control-label" for="customControlAutosizing1 {{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <label class="col-sm-2 text-right control-label ">User</label>
                                <div class="col-sm-10">
                                    @foreach ($permissions as $permission)
                                    @if($permission->pfor === 'user')
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 {{$permission->id}}" name="permission_r[]" value="{{$permission->id}}"> <label class="custom-control-label" for="customControlAutosizing1 {{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                </div>
                                <div class="col-md-4">
                                <label class="col-sm-2 text-right control-label ">Other</label>
                                <div class="col-sm-10">
                                    @foreach ($permissions as $permission)
                                    @if($permission->pfor === 'other')
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 {{$permission->id}}" name="permission_r[]" value="{{$permission->id}}"> <label class="custom-control-label" for="customControlAutosizing1 {{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" id="add_roles">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')

    @endsection