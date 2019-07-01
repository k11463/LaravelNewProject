@extends('layouts.app')

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
        <div class="toolbox">
            <a href="" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger">Delete</button>
        </div>
        <div class="content">
            {{ $post->content }}
        </div>
    </div>
</div>
@endsection
