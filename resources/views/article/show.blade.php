@extends('layouts.app')
@section('title', isset($article->title) ? $article->title : '个人文章')

@section('style')
    <link href="https://cdn.bootcss.com/fluidbox/2.0.5/css/fluidbox.min.css" rel="stylesheet">
<style>
    .markdown {
        margin-top: 25px;
    }
    .markdown > pre {
        color: white;
        background: #3A3C3E;
        margin: 20px 0 20px 0;
    }
    .markdown > p {
        line-height: 26px;
        /*margin-bottom: 20px;*/
    }

    .markdown  img {
        max-width: 100%;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin-bottom: 30px;
        margin-top: 10px;
        border: 1px solid #ddd;
        -webkit-box-shadow: 0 0 30px #ccc;
        box-shadow: 0 0 30px #ccc;
    }
    .markdown .fluidbox--closed {
        cursor: zoom-in;
    }

</style>
@endsection

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
        <div class="col-md-9">
            <div class="vasar" style="padding: 40px 35px 40px 35px;">
                <div class="blog-post">
                    <h2 class="blog-post-title" style="font-size: 22px;padding: 0;margin: 0;">{{ $article->title }}</h2>
                    <p style="margin-top: 15px; border-bottom: 1px solid #EEEEEE;padding-bottom: 10px; font-size: 12px;color: #B2B6B4;">创建于 <span data-toggle="tooltip" data-original-title="{{ $article->created_at->toDateTimeString() }}">{{ $article->created_at->diffForHumans() }}</span> / <span>阅读数 {{ $article->click_count }} </span></p>
                    {{--<P style="text-indent: 2em;">{!! $article->content !!}</P>--}}
                    <div class="markdown">
                        @markdown($article->content)
                    </div>
                </div><!-- /.blog-post -->

            </div>
        </div>
        <div class="col-md-4 right">

        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="https://cdn.bootcss.com/fluidbox/2.0.5/js/jquery.fluidbox.min.js"></script>
    <script>
        $('.markdown a[href^="http://"], .markdown a[href^="https://"]').each(function() {
            var a = new RegExp('/' + window.location.host + '/');
            if(!a.test(this.href) ) {
                $(this).click(function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    window.open(this.href, '_blank');
                });
            }
        });

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

            $(".markdown img").each(function () {
                $(this).wrap("<a href="+this.src+"></a>");
            });
            $('.markdown a').fluidbox();

        })
    </script>
    <script>
        $(function(){
            $("[data-toggle='tooltip']").tooltip();
        })
    </script>
@stop

