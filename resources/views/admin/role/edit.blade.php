@extends('admin/layouts/app')
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{route('tag.index')}}" class="btn btn-info mb-2">Go Back</a>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Role Info</h4>
                    <form id="tag_form" action="{{route('tag.update',$tag->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Tag Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tagtitle" name="tagtitle" placeholder="Tag Title" value="{{$tag->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Tag Slug</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tagslug" name="tagslug" placeholder="Slug" value="{{$tag->slug}}">
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

    @endsection