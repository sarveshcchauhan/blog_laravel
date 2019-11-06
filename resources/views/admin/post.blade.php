@extends('admin/app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/quill/dist/quill.snow.css')}}">
@endsection
@section('body-content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog Info</h4>
                    <form>
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
                                    <input type="file" class="custom-file-input" id="validatedCustomFile image" name="image" required="">
                                    <label class="custom-file-label" for="validatedCustomFile image">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 text-right control-label ">Checkboxes</label>
                            <div class="col-sm-5">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1 status" name="publish">
                                    <label class="custom-control-label" for="customControlAutosizing1 status">Publish</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Body</label>
                            <div class="col-sm-11">
                                <textarea type="text" class="form-control" id="editor" name="body" style="height: 300px;"></textarea>
                            </div>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script src="{{asset('admin/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
    @endsection