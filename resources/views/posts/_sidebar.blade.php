@php
use App\Category;
use App\Tag;
$categories = Category::all();
$tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count', 'desc')->get(); // _count可直接印出數量
@endphp

<!--latest post widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">最新文章</h6>
    </div>
    <ul class="widget-latest-post">
        <li>
            <div class="thumb">
                <a href="#">
                    <img src="/assets/img/post/post-thumb.jpg" alt="" />
                </a>
            </div>
            <div class="w-desk">
                <a href="#">標題</a>
                MAR 5, 2019
            </div>
        </li>
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
        <li>Jonathan on <a href="javascript:;">Vesti blulum quis dolor </a>
        </li>
        <li>Jane Doe on <a href="javascript:;">Nam sed arcu tellus</a>
        </li>
        <li>Margarita on <a href="javascript:;">Fringilla ut vel ipsum </a>
        </li>
        <li>Smith on <a href="javascript:;">Vesti blulum quis dolor sit</a>
        </li>
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
