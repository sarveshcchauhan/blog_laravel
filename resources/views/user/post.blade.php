@extends('user/app')

@section('heroimg',asset('user/img/post-bg.jpg'))
@section('my-styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/quill/dist/quill.snow.css')}}">
@endsection
@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="editor">{{$post->body}}</div>
                <div id="body"></div>
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

        var editor = new Quill('#editor');
        var justHtmlContent = document.getElementById('body');
        justHtmlContent.innerHTML = justHtml;
        console.log(justHtml);


    });
</script>
@endsection