@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="row">
        <!-- 左边 -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('category.index', 2) }}" class="list-group-item active list-group-item-info">
                    API文档
                </a>
                @foreach($apiDocs as $doc)
                    <a class="list-group-item click" href="{{ $doc->url }}" target="_blank" data-id="{{ $doc->id }}">{{ $doc->title }}</a>
                @endforeach
            </div>
            <div class="list-group">
                <a href="{{ route('category.index', 5) }}" class="list-group-item active list-group-item-info">
                    名博客
                </a>
                @foreach($blogs as $blog)
                    <a class="list-group-item click" href="{{ $blog->url }}" target="_blank" data-id="{{ $blog->id }}">{{ $blog->title }}</a>
                @endforeach
            </div>
            <div class="list-group">
                <a href="{{ route('category.index', 11) }}" class="list-group-item active list-group-item-info">
                    开发手册
                </a>
                @foreach($manuals as $manual)
                    <a class="list-group-item click" href="{{ $manual->url }}" target="_blank" data-id="{{ $manual->id }}">{{ $manual->title }}</a>
                @endforeach
            </div>
        </div>
        <!-- 右边 -->
        <div class="col-md-8">
            <div class="list-group tools">
                <a href="{{ route('category.index', 8) }}" class="list-group-item active list-group-item-info">
                    常用工具
                </a>
                <ul>
                    @foreach($tools as $tool)
                        <li><a href="{{ $tool->url }}" target="_blank" class="click" data-id="{{ $tool->id }}">{{ $tool->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="list-group tools">
                <a href="{{ route('category.index', 6) }}" class="list-group-item active list-group-item-info">
                    学习英语
                </a>
                <ul>
                    @foreach($englishs as $english)
                        <li><a href="{{ $english->url }}" target="_blank" class="click" data-id="{{ $english->id }}">{{ $english->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="list-group tools">
                <a href="{{ route('category.index', 9) }}" class="list-group-item active list-group-item-info">
                    软件推荐
                </a>
                <ul>
                    @foreach($softwares as $software)
                        <li><a href="{{ $software->url }}" target="_blank" class="click" data-id="{{ $software->id }}">{{ $software->title }}</a></li>
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
                url: "{{ route('page.count') }}",
                data: "id=" + id,
                success: function(){}
            });
        });

    })
</script>
@stop

