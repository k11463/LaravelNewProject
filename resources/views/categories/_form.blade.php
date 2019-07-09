@php
class Data
{
public $actionUrl;
public $buttonText;
}
$data = new Data;

switch ($action) {
case 'create':
$data->actionUrl = '/categories';
$data->buttonText = '建立分類';
break;
case 'edit':
$data->actionUrl = '/categories/'.$category->id;
$data->buttonText = '修改分類';
break;
}
@endphp

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $key => $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ $data->actionUrl }}">
    @csrf
    @if($action == 'edit')
    <input type="hidden" name="_method" value="put">
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">分類名稱</label>
        <input type="text" class="form-control" name="name" placeholder="輸入分類名稱" value="{{ $category->name }}">
    </div>
    <button type="submit" class="btn btn-primary">{{ $data->buttonText }}</button>
    <button type="button" class="btn btn-secondary" onclick="window.history.back()">取消</button>
</form>
