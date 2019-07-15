@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">編輯文章</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/posts/admin">文章管理頁面</a>
                    </li>
                    <li class="breadcrumb-item active">編輯文章</li>
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
        @include('posts._form', ['action' => 'edit'])
    </div>
</div>
@endsection
