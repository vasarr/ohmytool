@extends('layouts.app')
@section('title', '搜索列表')

@section('content')
    <!-- 面包屑 -->
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Test</li>
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

