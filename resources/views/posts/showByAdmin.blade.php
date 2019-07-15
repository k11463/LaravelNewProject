@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">單篇文章管理</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/posts/admin">文章管理頁面</a>
                    </li>
                    <li class="breadcrumb-item active">單篇文章管理</li>
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
        <h1 class="mb-0"> {{ $post->title }} </h1>
        @if (isset($post->category))
        <small class="d-block text-muted">#{{ $post->category->name }}</small>
        @endif
        <small class="d-block text-muted">{{ $post->tagsString() }}</small>
        <small class="author">{{ $post->user->name }}</small>
        <div class="toolbox text-left mt-3">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">編輯</a>
            <button class="btn btn-danger" onclick="deletePost({{ $post->id }}, '{{ $post->title }}')">刪除</button>
        </div>
        @if ($post->thumbnail)
        <img width="400" src="{{ $post->thumbnail }}" alt="thumbnail">
        @else
        <div class="text-danger">沒有圖片</div>
        @endif
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
