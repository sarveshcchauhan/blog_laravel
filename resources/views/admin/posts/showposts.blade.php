@extends('admin/layouts/app')
@section('styles')
<link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('body-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
                @can('posts.create',Auth::user())
            <a href="{{route('post.create')}}" class="btn btn-primary mb-2">Add Post</a>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Basic Datatable</h5>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 245px;">Sr No#</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 381px;" aria-sort="ascending">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Sub Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Slug</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Status</th>
                                                @can('posts.update',Auth::user())
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 93px;">Edit</th>@endcan
                                                @can('posts.delete',Auth::user())
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 165px;">Delete</th>@endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posts as $post)
                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td class="sorting_1">{{$post->title}}</td>
                                                <td>{{$post->subtitle}}</td>
                                                <td>{{$post->slug}}</td>
                                                <td>{{$post->status}}</td>
                                                @can('posts.update',Auth::user())
                                                <td><a href="{{route('post.edit',$post->id)}}">Edit</a></td>
                                                @endcan
                                                @can('posts.delete',Auth::user())
                                                <td>
                                                    <form id="delete_post_{{$post->id}}" method="POST" action="{{route('post.destroy',$post->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delete-btn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                @endcan
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Sr No#</th>
                                                <th rowspan="1" colspan="1">Title</th>
                                                <th rowspan="1" colspan="1">Sub Title</th>
                                                <th rowspan="1" colspan="1">Slug</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                @can('posts.update',Auth::user())<th rowspan="1" colspan="1">Edit</th> @endcan 
                                                 @can('posts.delete',Auth::user())<th rowspan="1" colspan="1">Remove</th>@endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        $(function() {
            $('#zero_config').DataTable();
        })
    </script>
    @endsection