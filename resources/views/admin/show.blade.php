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
                    <h2>Dummy Contnet</h2>

                    <p><a href="{{route('post.create')}}">Create Post</a></p>
                    <p><a href="{{route('category.create')}}">Create Cat</a></p>
                    <p><a href="{{route('tag.create')}}">Create Tags</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection