@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Create Post</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class=""><a href="/posts/admin">Blog Admin Panel</a>
                    </li>
                    <li class="active">Create Post</li>
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
        @include('posts._form')
    </div>
</div>
@endsection
