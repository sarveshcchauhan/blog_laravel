@extends('admin/layouts/app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
@endsection
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{route('user.index')}}" class="btn btn-info mb-2">Go Back</a>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User info</h4>
                    <form id="tag_form" action="{{route('user.create')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-md-2 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your fullname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-md-2 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Your Email id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-md-2 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 col-md-2 text-right control-label col-form-label">Confirm Password</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cfpassword" name="cfpassword" placeholder="Same password as above">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 col-md-2 text-right control-label col-form-label">Mobile No</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-md-2 text-right control-label">Roles</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    @foreach($roles as $role)
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 {{$role->id}}" name="publish[]" value="{{$role->id}}"> <label class="custom-control-label" for="customControlAutosizing1 {{$role->id}}">{{$role->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" id="add_tags">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script>
         $(".select2").select2();
    </script>
    @endsection