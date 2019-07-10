@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章管理</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">文章管理</li>
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
        <div class="clearfix toolbox">
            <a href="/posts/create" class="btn btn-primary">建立文章</a>
        </div>
        <ul class="list-group">
            @foreach ($posts as $key => $post)
            <li class="list-group-item clearfix">
                <div class="float-left">
                    <div class="tltle">{{ $post->title }}</div>
                    @if(isset($post->category)) <small class="d-block text-muted">#{{ $post->category->name }}</small>
                    @endif
                    <small class="author">{{ $post->user->name }}</small>
                </div>
                <span class="float-right">
                    <a href="/posts/show/{{ $post->id }}" class="btn btn-secondary">內容</a>
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">編輯</a>
                    <button class="btn btn-danger"
                        onclick="deletePost({{ $post->id }}, '{{ $post->title }}')">刪除</button>
                </span>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<form id="delete_form" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
</form>
@endsection

@section('script')
<script>
    const deletePost = (id, title) => {
        const result = confirm('你想刪除 <' + title + '> 這篇文章嗎?');
        if(result) {
            const actionUrl = '/posts/' + id;
            $('#delete_form').attr('action', actionUrl).submit();
        }
    }
</script>
@endsection
