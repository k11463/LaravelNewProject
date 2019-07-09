@php
class Data
{
public $actionUrl;
public $buttonText;
}
$data = new Data;

switch ($action) {
case 'create':
$data->actionUrl = '/posts';
$data->buttonText = '發表文章';
break;
case 'edit':
$data->actionUrl = '/posts/'.$post->id;
$data->buttonText = '修改文章';
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
        <label>標題</label>
        <input type="text" class="form-control" name="title" placeholder="輸入標題" value="{{ $post->title }}">
    </div>
    <div class="form-group clearfix">
        <label>分類</label><label class="pull-right">目前分類 : @if(isset($post->category)) {{ $post->category->name }}
            @else 無分類
            @endif</label>
        <select class="form-control" name="category_id">
            <option selected value>請選擇分類</option>
            @foreach ($categories as $key => $category)
            <option value="{{ $category->id }}" @if($category->id === $post->category_id) selected
                @endif>{{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>內容</label>
        <textarea class="form-control" name="content" cols="80" rows="8"
            placeholder="輸入內容">{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">{{ $data->buttonText }}</button>
    <button type="button" class="btn btn-secondary" onclick="window.history.back()">取消</button>
</form>
