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
                    <form id="tag_form" action="{{route('user.update',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-md-2 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your fullname" value="@if(old('name')) {{old('name')}}  @else {{$user->name}} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-md-2 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email id" value="@if(old('email')) {{old('email')}} @else {{$user->email}} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 col-md-2 text-right control-label col-form-label">Mobile No</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile" value="@if(old('phone')) {{old('phone')}} @else {{$user->phone}} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-md-2 text-right control-label">Status</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1" name="status" @if(old('status')==1 || $user->status==1) checked @endif  value="1"> <label class="custom-control-label" for="customControlAutosizing1" >Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-md-2 text-right control-label">Roles</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    @foreach($roles as $role)
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 {{$role->id}}" name="role[]" value="{{$role->id}}" @foreach ($user->roles as $user_role)
                                        @if ($user_role->id == $role->id)
                                            checked
                                        @endif 
                                    @endforeach> <label class="custom-control-label" for="customControlAutosizing1 {{$role->id}}">{{$role->name}}</label>
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