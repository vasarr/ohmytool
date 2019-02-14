@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="col-md-8" style="margin: 0;padding: 0">
        <div class="apis vasar">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href=""><h2>在线文档</h2></a>
                    </div>
                    <div class="more"><a href="{{ route('category.index', 2) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($apiDocs as $resouce)
                    <div class="document-tools t-hover-shadow">
                        <div class="title"><a class="click" data-id="{{ $resouce->id }}" href="{{ $resouce->url }}" target="_blank"><h3>{{ $resouce->title }}</h3></a>
                        </div>
                        <div class="detail">
                            <div style="height: 35px;background: #F5F5FB;">
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tools vasar" style="margin-top: 20px;">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href="javascript:;"><h2>常用工具</h2></a>
                    </div>
                    <div class="more"><a href="{{ route('category.index', 8) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($tools as $resouce)
                    <div class="usual-tools t-hover-shadow">
                        <div class="title"><a class="click" data-id="{{ $resouce->id }}" target="_blank" href="{{ $resouce->url }}"><h3>{{ $resouce->title }}</h3></a>
                        </div>
                        <div class="detail">
                            <div style="height: 35px;background: #F5F5FB;">
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- 推荐图书 -->
        <div class="tools vasar" style="margin-top: 20px;">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href="javascript:;"><h2>推荐图书</h2></a>
                    </div>
                    <div class="more"><a href="javascript:;">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($books as $resouce)
                    <div class="books t-hover-shadow" style="">
                        <div class="title">
                            <a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}"><img src="{{ $resouce->icon_url }}" alt="{{ $resouce->title }}" width="135px;" height="180px;"></a>
                        </div>
                        <div class="detail" style="text-align: center;">
                            <div class="book-title">
                                <a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}" style="display: block;"><h3 style="font-size: 14px;margin: 0;padding: 0;">《{{ $resouce->title }}》</h3></a>
                            </div>
                            <div class="detail">
                                <div style="height: 35px;background: #F5F5FB;">
                                    <p style="text-align:left;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--end 推荐图书 -->
        <div class="tools vasar" style="margin-top: 20px;">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href="javascript:;"><h2>推荐文章</h2></a>
                    </div>
                    <div class="more"><a href="{{ route('category.index', 12) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($articles as $resouce)
                    <div class="usual-tools t-hover-shadow" style="">
                        <div class="title"><a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}"><h3>{{ $resouce->title }}</h3></a>
                        </div>
                        <div class="detail">
                            <div style="height: 35px;background: #F5F5FB;">
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tools vasar" style="margin-top: 20px;">
            <div class="document">
                <div class="list-header">
                    <div class="category-name">
                        <a href="javascript:;"><h2>学习英语</h2></a>
                    </div>
                    <div class="more"><a href="{{ route('category.index', 6) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($englishs as $resouce)
                    <div class="usual-tools t-hover-shadow">
                        <div class="title"><a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}"><h3>{{ $resouce->title }}</h3></a>
                        </div>
                        <div class="detail">
                            <div style="height: 35px;background: #F5F5FB;">
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="softs vasar" style="margin: 20px 0 20px 0;">
            <div class="document">
                <div class="list-header">
                    <div class="category-name" style="">
                        <a href="javascript:;"><h2>推荐软件</h2></a>
                    </div>
                    <div class="more"><a href="{{ route('category.index', 9) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
                </div>
            </div>
            <div class="list">
                @foreach($softwares as $resouce)
                    <div class="fronts-tools t-hover-shadow">
                        <div class="title"><a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}"><h3>{{ $resouce->title }}</h3></a>
                        </div>
                        <div class="detail">
                            <div style="height: 35px;background: #F5F5FB;">
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ $resouce->description }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>{{--left--}}
    <div class="col-md-4">
        <div class="box recommend">
            <div class="recommend-header" style="font-size: 16px; padding: 10px; border-bottom: 1px solid #DEDEDF;">
                <span class="glyphicon glyphicon-bullhorn" aria-hidden="true" style="margin-right: 10px; color: red; font-size: 18px;"></span><h2 style="padding: 0;margin: 0; font-size: 18px; display: inline-block;">Ohmytool 平台</h2>
            </div>
            <div style="padding: 15px; line-height: 22px; border-bottom: 1px solid #F2F2F2;margin-bottom: 5px;">
                这是一个<strong style="color: #24A457;">『资源查阅，资源分享』</strong>的分类网站。在学习的路上指引你的成长。
            </div>
            <div style="padding: 5px 0 10px 0;" class="">
                <a class="btn center-block" href="{{ route('page.recommend') }}" role="button" target="_blank" style="border: 1px solid red;letter-spacing:2px; margin: 0 100px 0 100px; color: red;box-shadow: none;"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 10px;"></span><strong>推荐资源</strong></a>
            </div>
        </div>{{--推荐资源z--}}
        <div class="list vasar" style="border-top: 2px solid #5B388A;">
            <div class="blog-header">
                <div class="" style="font-size: 18px;">
                    <span class="glyphicon glyphicon-list" aria-hidden="true" style="margin-right: 10px;"></span><span>推荐博客</span>
                </div>
                <div class="more">
                    <a href="{{ route('category.index', 5) }}">MORE <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                </div>
            </div>
            <div class="blog-list">
                @foreach($blogs as $resouce)
                    <div class="b-list">
                        <div class="no">0{{ $loop->iteration }}</div>
                        <div class="description">
                            <div class="desc-title">
                                <a href="{{ $resouce->url }}" target="_blank" class="click" data-id="{{ $resouce->id }}"><h2 style="font-size: 16px;margin:0;border: 0px;">{{ $resouce->title }}</h2></a>
                            </div>
                            <p style="color: #313131"><small>{{$resouce->description}}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end推荐blog -->
    </div>{{--right--}}
@endsection

@section('script')
    <script>
        $(function () {
            $('.click').click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "PUT",
                    url: "{{ route('page.count') }}",
                    data: "id=" + id,
                    success: function () {
                    }
                });
            });

        })
    </script>
@stop

