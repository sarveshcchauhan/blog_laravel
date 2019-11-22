@extends('user/app')

@section('heroimg',asset('user/img/home-bg.jpg'))

@section('main-content')
<!-- Page Header -->
<header class="masthead" style="background-image: url(@yield('heroimg'))">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Blog</h1>
                    <span class="subheading">Blog page</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="">Dashboard</div>

            <div class="">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection