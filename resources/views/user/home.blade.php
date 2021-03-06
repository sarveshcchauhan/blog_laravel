@extends('user/app')
<!-- styles -->
@section('my-styles')
@endsection

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
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
            <div class="post-preview">
                <a href="{{route('blog_post',$post->slug)}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{$post->subtitle}}
                    </h3>
                </a>
                <a href="" class="post-meta"><p> <small>10</small>  <i class="fa fa-thumbs-up 2x"></i><i class="fa fa-thumbs-down 2x"></i></p></a>
                <p class="post-meta">Posted by
                    <a href="#"></a>
                    on {{$post->created_at->diffForHumans()}}</p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
<hr>
@endsection
<!-- scripts -->
@section('my-script')
@endsection