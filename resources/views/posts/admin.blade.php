@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Blog Admin Panel</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active">Blog Admin Panel</li>
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
                    <small class="author">{{ $post->user->name }}</small>
                </div>
                <span class="float-right">
                    <a href="/posts/show/{{ $post->id }}" class="btn btn-secondary">內容</a>
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">編輯</a>
                    <button class="btn btn-danger" onclick="deletePost({{ $post->id }})">刪除</button>
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
    const deletePost = (id) => {
        const result = confirm('Do you want to delete');
        if(result) {
            const actionUrl = '/posts/' + id;
            $('#delete_form').attr('action', actionUrl).submit();
        }
    }
</script>
@endsection
