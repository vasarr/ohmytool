@extends('layouts.app')
@section('title', isset($article->title) ? $article->title : '个人文章')

@section('content')
    <!-- 面包屑 -->
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $article->category->name }}</li>
            </ol>
        </div>
    </div>
    <!-- 列表 -->
    <div class="row">
        <div class="col-md-8 left">
            <div class="content">
                <div class="blog-post">
                    <h2 class="blog-post-title" style="font-size: 18px;">{{ $article->title }}</h2>
                    <p style="margin-top: 15px; border-bottom: 1px solid #EEEEEE;padding-bottom: 10px; font-size: 12px;color: #B2B6B4;">创建于 <span data-toggle="tooltip" data-original-title="{{ $article->created_at->toDateTimeString() }}">{{ $article->created_at->diffForHumans() }}</span> / <span>阅读数 {{ $article->click_count }} </span></p>
                    <P style="text-indent: 2em;">{!! $article->content !!}</P>
                </div><!-- /.blog-post -->
            </div>
        </div>
        <div class="col-md-4 right">

        </div>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $('.click').click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "PUT",
                    url: "{{ route('page.count') }}",
                    data: "id=" + id,
                    success: function(){}
                });
            });

        })
    </script>
    <script>
        $(function(){
            $("[data-toggle='tooltip']").tooltip();
        })
    </script>
@stop

