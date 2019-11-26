@extends('admin/layouts/app')
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{route('permission.index')}}" class="btn btn-info mb-2">Go Back</a>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permission Info</h4>
                    <form id="permission_form" action="{{route('permission.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Permission Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Permission Title">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Permission For</label>
                                <div class="col-sm-6">
                                    <select type="text" class="form-control" id="pfo" name="pfor">
                                        <option value="post">Post</option>
                                        <option value="user">User</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" id="add_permissions">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')

    @endsection