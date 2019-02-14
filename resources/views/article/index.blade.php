@extends('layouts.app')
@section('title', '个人文章')

@section('content')

<!-- 面包屑 -->
<div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">{{ $categoryName }}</li>
        </ol>
    </div>
</div>
<!-- 列表 -->
<div class="row">
    <div class="col-md-8 left">
        <div class="content vasar">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href="javascript:;"><h2>随笔列表</h2></a>
                    </div>
                </div>
            </div>
            @foreach($articles as $article)
            <div class="" style="border-bottom: 1px solid #EEEEEE; padding-bottom: 10px;">
                <div class="article-title">
                    <a href="{{ route('article.show', $article->id) }}"><h2>{{ $article->title }}</h2></a>
                    <p style="font-size: 13px; margin: 0 100px 0 0px;line-height: 20px;text-indent: 2em;">{{ $article->desc }}</p>
                    <div style="font-size: 12px;color: #B2B6B4;margin-top: 10px;">
                        <span data-toggle="tooltip" data-original-title="{{ $article->created_at->toDateTimeString() }}">创建于 {{ $article->created_at->diffForHumans() }}</span> | 阅读数 {{ $article->click_count }}
                    </div>
                </div>
            </div>
            @endforeach
            {{ $articles->links() }}
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

