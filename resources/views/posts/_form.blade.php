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
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Content</label>
        <textarea class="form-control" name="content" cols="80" rows="8"
            placeholder="Enter content">{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">{{ $data->buttonText }}</button>
    <button type="button" class="btn btn-secondary" onclick="window.history.back()">取消</button>
</form>
