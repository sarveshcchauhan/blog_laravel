@extends('admin/app')
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
                            <label for="fname" class="col-sm-1 text-right control-label col-form-label">Tag Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tagtitle" name="tagtitle" placeholder="Tag Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">Tag Slug</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tagslug" name="tagslug" placeholder="Slug">
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