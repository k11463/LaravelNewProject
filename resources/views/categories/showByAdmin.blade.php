@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Blog Single</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active"><a href="/posts/admin">Blog Admin Panel</a>
                    </li>
                    <li class="active">Blog Single</li>
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
        <h1> {{ $post->title }} </h1>
        <small class="author">{{ $post->user->name }}</small>
        <div class="toolbox">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">編輯</a>
            <button class="btn btn-danger" onclick="deletePost({{ $post->id }})">刪除</button>
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
    const deletePost = (id) => {
        const result = confirm("Do you want to delete this post?");
        if(result) {
            $("#delete_post").attr('action', '/posts/' + id).submit();
        }
    }
</script>
@endsection
