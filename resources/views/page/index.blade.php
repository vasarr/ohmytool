@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="row">
        <div class="col-md-8 left">
            <div class="content">
                <div class="docapi"><a href="{{ route('category.index', 2) }}">在线文档</a></div>
                <div class="frontslist">
                    @foreach($apiDocs as $doc)
                    <div class="fronts t-hover-shadow">
                        <div class="title"><a href="{{ $doc->url }}" target="_blank" class="atitle click" data-id="{{ $doc->id }}">{{ $doc->title }}</a></div>
                        <div class="detail">
                            <p>{{ $doc->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="docapi"><a href="{{ route('category.index', 8) }}">常用工具</a></div>
                <div class="frontslist">
                    @foreach($tools as $value)
                    <div class="fronts-tools t-hover-shadow">
                        <div class="title"><a href="{{ $value->url }}" target="_blank" class="atitle click">{{ $value->title }}</a></div>
                        <div class="detail">
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="docapi"><a href="{{ route('category.index', 12) }}" target="_blank">推荐文章</a></div>
                <div class="frontslist">
                    @foreach($articles as $value)
                    <div class="fronts-tools t-hover-shadow">
                        <div class="title"><a href="{{ $value->url }}" target="_blank" class="atitle click">{{ $value->title }}</a></div>
                        <div class="detail">
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="docapi"><a href="{{ route('category.index', 6) }}">学习英语</a></div>
                <div class="frontslist">
                    @foreach($englishs as $value)
                    <div class="fronts-tools t-hover-shadow">
                        <div class="title"><a href="{{ $value->url }}" target="_blank" class="atitle click">{{ $value->title }}</a></div>
                        <div class="detail">
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="docapi"><a href="{{ route('category.index', 9) }}">推荐软件</a></div>
                <div class="frontslist">
                    @foreach($softwares as $soft)
                    <div class="fronts t-hover-shadow">
                        <div class="title"><a href="{{ $soft->url }}" target="_blank" class="atitle click">{{ $soft->title }}</a></div>
                        <div class="detail">
                            <p>{{ $soft->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 right">
            <div class="list">
                <div class="header">
                    <span class="glyphicon glyphicon-list" aria-hidden="true" style="margin-right: 10px;"></span><a href="{{ route('category.index', 5) }}"><span>推荐博客</span></a>
                </div>
                <div class="right-list">
                    @foreach($blogs as $blog)
                    <div class="no">0{{$loop->iteration}}</div>
                    <div class="description">
                        <div class="desc-title" style="margin-top: 10px; font-size: 18px; margin-bottom: 10px;">
                            <a href="{{ $blog->url }}" target="_blank" style="" class="atitle click" data-id="{{ $blog->id }}">{{ $blog->title }}</a>
                        </div>
                        <p><small>{{ $blog->description }}</small></p>
                    </div>
                    @endforeach

                </div>
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

