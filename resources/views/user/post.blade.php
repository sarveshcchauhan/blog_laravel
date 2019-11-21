@extends('user/app')

@section('heroimg',asset('user/img/post-bg.jpg'))
@section('my-styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/quill/dist/quill.snow.css')}}">
@endsection

<!-- @section('hero-title','{{$post->title}}')
@section('hero-subhead','{{$post->subtitle}}') -->
@section('main-content')
<!-- Page Header -->
<header class="masthead" style="background-image: url(@yield('heroimg'));">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{$post->title}}</h1>
                    <span class="subheading">{{$post->subtitle}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <small>Created : {{$post->created_at->diffForHumans()}}</small>
                <small class="float-right">Category :
                    @foreach($post->category as $categories)
                    <a href="{{route('blog_category',$categories->slug)}}">
                        {{$categories->name}}
                    </a>
                    @endforeach
                </small>
                <div id="editor" style="display:none;">{{$post->body}}</div>
                <div id="body"></div>
                @foreach($post->tags as $tag)
                <a href="{{route('blog_tags',$tag->slug)}}" target="_blank">
                    <small class="float-right btn btn-warning">
                        {{$tag->name}}
                    </small>
                </a>
                @endforeach
                <div class="fb-comments mt-5" data-href="{{Request::url()}}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</article>
<hr>
@endsection

@section('my-script')
<script src="{{asset('admin/assets/libs/quill/dist/quill.min.js')}}"></script>
<script>
    $(function() {
        var quill = new Quill('#editor');
        var target = $('#editor');
        var content = JSON.parse(target[0].innerText);
        let body = quill.setContents(content);
        console.log(body);
        console.log(body.ops.length);
        let text = "";
        for (let i = 0; i < body.ops.length; i++) {
            text += body.ops[i].insert;
            console.log(text);
            $('#body').text(text);
        }
    });
</script>
@endsection