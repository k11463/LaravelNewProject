@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">
                    文章列表
                    @if (request()->category)
                    / 分類_{{ request()->category->name }}
                    @endif
                    @if (request()->user)
                    / 發文者_{{ request()->user->name }}
                    @endif
                    @if (request()->tag)
                    / 標籤_{{ request()->tag->name }}
                    @endif
                </h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a></li>
                    @if (request()->category)
                    <li class=""><a href="/posts">文章列表</a></li>
                    <li>分類_{{ request()->category->name }}</li>
                    @elseif (request()->user)
                    <li class=""><a href="/posts">文章列表</a></li>
                    <li>發文者_{{ request()->user->name }}</li>
                    @elseif (request()->tag)
                    <li class=""><a href="/posts">文章列表</a></li>
                    <li>標籤_{{ request()->tag->name }}</li>
                    @else
                    <li class="active">文章列表</li>
                    @endif
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
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $key => $post)
                <!--classic image post-->
                <div class="blog-classic">
                    <div class="date">
                        {{ $post->created_at->month }} / {{ $post->created_at->day }}
                        <span>{{ $post->created_at->year }}</span>
                    </div>
                    <div class="blog-post">
                        <div class="full-width">
                            @if ($post->thumbnail)
                            <img src="{{ $post->thumbnail }}" alt="thumbnail" />
                            @else
                            <img src="/assets/img/post/p12.jpg" alt="" />
                            @endif
                        </div>
                        <h4 class="text-uppercase"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                        <ul class="post-meta">
                            <li><i class="fa fa-user"></i><a
                                    href="/posts/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                            </li>
                            @if ($post->category)
                            <li><i class="fa fa-folder-open"></i><a
                                    href="/posts/category/{{ $post->category_id }}">{{ $post->category->name }}</a></li>
                            @endif
                            <li><i class="fa fa-comments"></i> <a href="#">4 comments</a>
                            </li>
                        </ul>
                        <p>{{ str_limit($post->content, 250) }}</p>
                    </div>
                </div>
                <!--classic image post-->
                @endforeach

                <div class="text-center">
                    {{ $posts->links() }}
                </div>
                <!--pagination-->
                {{-- <div class="text-center">
                    <ul class="pagination custom-pagination">
                        <li><a href="#">Prev</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">Next</a>
                        </li>
                    </ul>
                </div> --}}
                <!--pagination-->

            </div>
            <div class="col-md-4">
                @include('posts._sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
