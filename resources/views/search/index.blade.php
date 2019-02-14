@extends('layouts.app')
@section('title', '搜索列表')

@section('content')
    <!-- 搜索 -->
    <div class="row">
        <div class="col-lg-6">
            <form class="navbar-form search-form" method="get" action="{{ route('search.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" size="50" name="q">
                    <span class="input-group-btn">
               <button class="btn btn-search" style="background: #24A457; color: white;">搜 索</button>
            </span>
                </div>
            </form>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <!-- 面包屑 -->
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">搜索列表</li>
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
                {{ $tools->appends($filters)->render() }}

        </div>
        <!-- 右边 -->
        <div class="col-md-4">

        </div>
    </div>
@stop

@section('script')
    <script>
        var filters = {!! json_encode($filters) !!};

        $(function () {
            // search
            $('.search-form input[name=q]').val(filters.q);

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

