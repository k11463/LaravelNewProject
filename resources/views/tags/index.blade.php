@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">標籤管理</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item active">標籤管理</li>
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
        <ul class="list-group">
            @foreach ($tags as $key => $tag)
            <li class="list-group-item clearfix">
                <div class="float-left">
                    <div class="tltle">{{ $tag->name }}</div>
                </div>
                <span class="float-right">
                    <button class="btn btn-danger"
                        onclick="deleteCategory({{ $tag->id }}, '{{ $tag->name }}')">刪除</button>
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
        const result = confirm('你想刪除 <' + name + '> 這個標籤嗎?');
        if(result) {
            const actionUrl = '/tags/' + id;
            $('#delete_form').attr('action', actionUrl).submit();
        }
    }
</script>
@endsection
