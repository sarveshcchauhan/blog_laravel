@extends('admin/layouts/app')
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
            <a href="{{route('category.index')}}" class="btn btn-info mb-2">Go back</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog Info</h4>
                    <form action="{{route('category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Category Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="categorytitle" name="categorytitle" placeholder="Category Title" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Category Slug</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="categoryslug" name="categoryslug" placeholder="Slug" value="{{$category->slug}}">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection