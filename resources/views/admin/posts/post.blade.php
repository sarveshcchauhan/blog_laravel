@extends('admin/layouts/app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/quill/dist/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
@endsection
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
            <a href="{{route('post.index')}}" class="btn btn-info mb-2">Go Back</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog Info</h4>
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Title</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Sub Title</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Slug</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-1 text-right control-label col-form-label">File Upload</label>
                            <div class="col-sm-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile image" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile image">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 text-right control-label ">Status</label>
                            <div class="col-sm-5">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 status" name="publish" value="1"> <label class="custom-control-label" for="customControlAutosizing1 status">Publish</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-15 text-right control-label">Select Tags</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control m-t-15" name="tags[]" multiple="multiple" style="height: 36px;width: 100%;">
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-15 text-right control-label">Select Category</label>
                                    <div class="col-md-8">
                                        <select class="select2 form-control m-t-15" name="categories[]" multiple="multiple" style="height: 36px;width: 100%;">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Body</label>
                            <div class="col-sm-11">
                                <input name="body" id="body" type="hidden">
                                <div id="editor" style="height: 300px;"></div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" id="post_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script src="{{asset('admin/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script>
        $(function() {
            $(".select2").select2();

            var quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic'],
                        ['link', 'blockquote', 'code-block', 'image'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }]
                    ]
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
            });
            $('#post_submit').on('click', function() {
                var body = document.querySelector('input[name=body]');
                body.value = JSON.stringify(quill.getContents());
                $(form).serialize(), $(form).serializeArray();
                return false;
            });
        });
    </script>
    @endsection