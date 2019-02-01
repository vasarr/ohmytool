@extends('layouts.app')
@section('title', '首页')

@section('content')
    <!-- 搜索 -->
    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
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
        <!-- 左边 -->
        <div class="col-md-8">
            @foreach($tools as $tool)
            <div class="list-group">
                <a href="{{ $tool->url }}" class="list-group-item click" target="_blank" data-id="{{ $tool->id }}">
                    <h5 class="list-group-item-heading">{{ $tool->title }}</h5>
                    <p class="list-group-item-text" style="font-size: 12px; padding: 10px 0 10px 0;">{{ $tool->description }}</p>
                </a>
            </div>
            @endforeach
            {{--分页--}}
            {{ $tools->links() }}
        </div>
        <!-- 右边 -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('category.index', 5) }}" class="list-group-item list-group-item-info">
                    名博客
                </a>
                @foreach($blogs as $blog)
                    <a class="list-group-item click" href="{{ $blog->url }}" target="__blank" data-id="{{ $blog->id }}">{{ $blog->title }}</a>
                @endforeach
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

