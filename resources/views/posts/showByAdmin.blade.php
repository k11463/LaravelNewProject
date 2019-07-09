@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">單篇文章管理</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li class="active"><a href="/posts/admin">文章管理頁面</a>
                    </li>
                    <li class="active">單篇文章管理</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--page title end-->
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <h1 style="margin-bottom: 0px;"> {{ $post->title }} </h1>
        @if(isset($post->category)) <small class="text-muted">#{{ $post->category->name }}</small> @endif
        <small class="author">{{ $post->user->name }}</small>
        <div class="toolbox" style="margin-top: 3px;">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">編輯</a>
            <button class="btn btn-danger" onclick="deletePost({{ $post->id }}, '{{ $post->title }}')">刪除</button>
        </div>
        <div class="content">
            {{ $post->content }}
        </div>
    </div>
</div>

<form id="delete_post" method="POST">
    @csrf
    <input type="hidden" name="_method" value="delete">
</form>
@endsection

@section('script')
<script>
    const deletePost = (id, title) => {
        const result = confirm("你想刪除 <" + title + '> 這篇文章嗎?');
        if(result) {
            $("#delete_post").attr('action', '/posts/' + id).submit();
        }
    }
</script>
@endsection
