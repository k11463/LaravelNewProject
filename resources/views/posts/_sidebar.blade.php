@php
use App\Category;
use App\Tag;
use App\Post;
use App\Comment;
$categories = Category::all();
$tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count', 'desc'); // _count可直接印出數量
$latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
$latestComments = Comment::orderBy('created_at', 'desc')->take(3)->get();
@endphp

<!--latest post widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">最新文章</h6>
    </div>
    <ul class="widget-latest-post">
        @foreach ($latestPosts as $key => $post)
        <li>
            <div class="thumb">
                <a href="/posts/{{ $post->id }}">
                    @if ($post->thumbnail)
                    <img src="{{ $post->thumbnail }}" alt="thumbnail" />
                    @else
                    <img src="/assets/img/post/post-thumb.jpg" alt="" />
                    @endif
                </a>
            </div>
            <div class="w-desk">
                <a href="#">{{ $post->title }}</a>
                {{ $post->created_at->format('F d, Y') }}
            </div>
        </li>
        @endforeach
    </ul>
</div>
<!--latest post widget-->

<!--category widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">分類</h6>
    </div>
    <ul class="widget-category">
        @foreach ($categories as $key => $category)
        <li><a href="/posts/category/{{ $category->id }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
<!--category widget-->

<!--comments widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">最新評論</h6>
    </div>
    <ul class="widget-comments">
        @foreach ($latestComments as $key => $comment)
        <li>
            {{ $comment->name }} on <a href="/posts/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
        </li>
        @endforeach
    </ul>
</div>
<!--comments widget-->

<!--tags widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">標籤</h6>
    </div>
    <div class="widget-tags">
        @foreach ($tags as $key => $tag)
        <a href="/posts/tag/{{ $tag->id }}">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
<!--tags widget-->
