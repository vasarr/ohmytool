@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="row">
        <!-- 左边 -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    API文档
                </a>
                @foreach($apiDocs as $doc)
                    <a class="list-group-item click" href="{{ $doc->url }}" target="__blank" data-id="{{ $doc->id }}">{{ $doc->title }}</a>
                @endforeach
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    名博客
                </a>
                @foreach($blogs as $blog)
                    <a class="list-group-item click" href="{{ $blog->url }}" target="__blank" data-id="{{ $blog->id }}">{{ $blog->title }}</a>
                @endforeach
            </div>
        </div>
        <!-- 右边 -->
        <div class="col-md-8">
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    常用工具
                </a>
                <ul>
                    @foreach($tools as $tool)
                        <li><a href="{{ $tool->url }}" target="__blank" class="click" data-id="{{ $tool->id }}">{{ $tool->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    学习英语
                </a>
                <ul>
                    @foreach($englishs as $english)
                        <li><a href="{{ $english->url }}" target="__blank" class="click" data-id="{{ $english->id }}">{{ $english->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    软件推荐
                </a>
                <ul>
                    @foreach($softwares as $software)
                        <li><a href="{{ $software->url }}" target="__blank" class="click" data-id="{{ $software->id }}">{{ $software->title }}</a></li>
                    @endforeach
                </ul>
            </div>
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
                url: "page/count",
                data: "id=" + id,
                success: function(){}
            });
        });

    })
</script>
@stop

