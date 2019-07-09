@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">編輯分類</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li class="active"><a href="/categories/index">分類管理頁面</a>
                    </li>
                    <li class="active">編輯分類</li>
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
        @include('categories._form', ['category' => $category, 'action' => 'edit'])
    </div>
</div>
@endsection
