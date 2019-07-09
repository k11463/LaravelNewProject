@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">分類管理頁面</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item active">分類管理頁面</li>
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
            <a href="/categories/create" class="btn btn-primary">建立分類</a>
        </div>
        <ul class="list-group">
            @foreach ($categories as $key => $category)
            <li class="list-group-item clearfix">
                <div class="float-left">
                    <div class="tltle">{{ $category->name }}</div>
                </div>
                <span class="float-right">
                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-primary">編輯</a>
                    <button class="btn btn-danger"
                        onclick="deleteCategory({{ $category->id }}, '{{ $category->name }}')">刪除</button>
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
    const deleteCategory = (id, name) => {
        const result = confirm('你想刪除 <' + name + '> 這個類別嗎?');
        if(result) {
            const actionUrl = '/categories/' + id;
            $('#delete_form').attr('action', actionUrl).submit();
        }
    }
</script>
@endsection
