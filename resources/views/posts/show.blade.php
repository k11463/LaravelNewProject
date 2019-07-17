@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">{{ $post->title }}</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li class="active"><a href="/posts">文章列表</a>
                    </li>
                    <li class="active">{{ $post->title }}</li>
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
                <!--classic image post-->
                <div class="blog-classic">
                    <div class="blog-post">
                        <div class="full-width">
                            @if ($post->thumbnail)
                            <img src="{{ $post->thumbnail }}" alt="thumbnail" />
                            @else
                            <img src="/assets/img/post/p12.jpg" alt="" />
                            @endif
                        </div>
                        <h4 class="text-uppercase"><a href="blog-single.html">{{ $post->title }}</a></h4>
                        <ul class="post-meta">
                            <li><i class="fa fa-user"></i><a
                                    href="/posts/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                            </li>
                            <li><i class="fa fa-folder-open"></i> <a href="#">
                                    @if ($post->category)
                                    {{ $post->category->name }}
                                    @else
                                    無分類
                                    @endif</a></li>
                            <li><i class="fa fa-comments"></i> <a href="#">{{ $post->comments->count() }} comments</a>
                            </li>
                        </ul>

                        <p>{{ $post->content }}</p>

                        <div class="inline-block">
                            @if ($post->tags->count() > 0)
                            <div class="widget-tags">
                                <h6 class="text-uppercase">Tags </h6>
                                @foreach ($post->tags as $key => $tag)
                                <a href="/posts/tag/{{ $tag->id }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>


                        <div class="clearfix inline-block m-top-50 m-bot-50">
                            <h6 class="text-uppercase">Share this Post </h6>
                            <div class="widget-social-link circle">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>


                        <div class="pagination-row">

                            <div class="pagination-post">
                                <div class="prev-post">
                                    <a href="#">
                                        <div class="arrow">
                                            <i class="fa fa-angle-double-left"></i>
                                        </div>
                                        <div class="pagination-txt">
                                            <span>Previous Post</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="post-list-link">
                                    <a href="#">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </div>

                                <div class="next-post">
                                    <a href="#">
                                        <div class="arrow">
                                            <i class="fa fa-angle-double-right"></i>
                                        </div>
                                        <div class="pagination-txt">
                                            <span>Next Post</span>
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>


                        <!--comments discussion section start-->

                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h4 class="text-uppercase">{{ $post->comments->count() }} Comments</h4>
                        </div>

                        <ul class="media-list comments-list m-bot-50 clearlist">
                            @foreach ($post->comments as $key => $comment)
                            <!-- Comment Item start-->
                            <li class="media">

                                <a class="pull-left" href="#">
                                    <img class="media-object comment-avatar" src="/assets/img/post/a1.png" alt=""
                                        width="50" height="50">
                                </a>

                                <div class="media-body">

                                    <div class="comment-info">
                                        <div class="comment-author">
                                            @if (is_null($comment->user_id))
                                            <a href="#">{{ $comment->name }}</a>
                                            @else
                                            <a href="#">{{ $comment->user->name }}</a>
                                            @endif
                                        </div>
                                        {{ $comment->created_at->format('F d, Y, ').'at '.$comment->created_at->format('G:i') }}
                                        <a href="#"><i class="fa fa-comment-o"></i>Reply</a>
                                    </div>

                                    <p>
                                        {{ $comment->comment }}
                                    </p>

                                </div>

                            </li>
                            <!-- End Comment Item -->
                            @endforeach

                        </ul>

                        <!--comments discussion section end-->

                        <!--comments  section start-->

                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h4 class="text-uppercase">Leave a Comments</h4>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $key => $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="post" action="/comments" id="form" role="form" class="blog-comments">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <!-- Name -->
                                    @if (Auth::check())
                                    <input type="text" name="name" id="name" class=" form-control" placeholder="名稱"
                                        maxlength="100" value="{{ Auth::user()->name }}" required readonly>
                                    @else
                                    <input type="text" name="name" id="name" class=" form-control" placeholder="名稱"
                                        maxlength="100" required>
                                    @endif
                                </div>

                                <!-- Comment -->
                                <div class="form-group col-md-12">
                                    <textarea name="comment" id="text" class=" form-control" rows="6" placeholder="留言"
                                        maxlength="400" required></textarea>
                                </div>

                                <!-- Send Button -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-small btn-dark-solid ">
                                        Send comment
                                    </button>
                                </div>


                            </div>

                        </form>

                        <!--comments  section end-->



                    </div>
                </div>
                <!--classic image post-->

            </div>
            <div class="col-md-4">
                @include('posts._sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
