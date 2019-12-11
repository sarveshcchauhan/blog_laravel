@extends('admin/layouts/app')
@section('styles')
<link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('body-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @can('users.create',Auth::user())
            <a href="{{route('user.create')}}" class="btn btn-primary mb-2">Add user</a>
            @endcan
            @if(session()->has('message'))
            <p class="alert alert-success">{{session('message')}}</p>
                @endif
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 381px;" aria-sort="ascending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Assigned Roles</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 184px;">Status</th>
                                                @can('users.update',Auth::user())<th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 93px;">Edit</th> @endcan
                                                @can('users.delete',Auth::user())<th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 165px;">Delete</th> @endcan
                                            </tr>
                                            <tbody>
                                            </thead>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td class="sorting_1">{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>@foreach ($user->roles as $assign_role)
                                                    {{$assign_role->name}} ,
                                                @endforeach</td>
                                                <td>@if($user->status === 1) Active @else Not Active @endif</td>
                                                @can('users.update',Auth::user())<td><a href="{{route('user.edit',$user->id)}}">Edit</a></td>@endcan
                                                @can('users.delete',Auth::user())<td>
                                                    <form id="delete_user_{{$user->id}}" method="POST" action="{{route('user.destroy',$user->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delete-btn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>@endcan
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Sr No#</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Assigned Roles</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                @can('users.update',Auth::user())<th rowspan="1" colspan="1">Edit</th> @endcan
                                                @can('users.delete',Auth::user())<th rowspan="1" colspan="1">Delete</th>@endcan
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