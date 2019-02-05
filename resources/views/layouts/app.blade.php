<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="Ohmytool 是一个分享资源、工具推荐的导航网站，是日常工作总结的实践，目的是让我们在需要的过程中超速获取。">
    <meta name="keywords" content="php,laravel,在线文档,英语,在线工具,程序员,工具,开发人员工具,小工具,API查询,文档,推荐软件,软件设计">
    <meta name="author" content="vasar">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/favicon.ico">
    <title>@yield('title', 'Ohmytool') - 分享资源和工具推荐</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <script src="https://v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>
    <style type="text/css">
        body {
            background: #F0F2F5;
        }

        .navbar-static-top {
            margin-bottom: 19px;
        }

        .navbar {
            background: white;
            border-top: 5px solid #742474;
        }

        #navbar ul li {
            font-size: 1.09em;
        }

        #navbar ul li a:hover {
            background: #F2F2F2;
        }

        .content {
            /*height: 500px;*/
            background: #fff;
            padding: 20px;
        }

        .docapi {
            border-bottom: 1px solid #D9DEE0;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .docapi a {
            color: #FA6462;
            font-size: 18px;
        }

        .frontslist {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .t-hover-shadow {
            transition: transform .3s ease-in-out, box-shadow .1s cubic-bezier(.47, 0, .745, .715), border .3s linear .1s;
        }

        .t-hover-shadow:hover {
            border-radius: 5px;
            box-shadow: 1px 1px 0px 0px rgba(94, 93, 102, 0.08), 2px 2px 3px 0px rgba(94, 93, 102, 0.1);
            -webkit-transform: translateY(-1px);
            -moz-transform: translateY(-1px);
            transform: translateY(-1px)
        }

        .fronts {
            /*width: 225px;*/
            flex: 220px;
            /*border: 1px solid green;*/
            margin: 0 15px 5px 0;
        }

        .fronts-tools {
            flex: 250px;
            /*border: 1px solid green;*/
            margin: 0 15px 5px 0;
        }

        .title {
            padding: 10px;
            background-color: #FBFBFD;
            border-bottom: 1px solid #B7B7CC;
        }

        .title a {
            color: #219865;
        }

        .title a:hover {
            text-decoration: none;
        }

        .atitle {
            display: block;
            text-decoration: none;
        }

        .atitle h3 {
            padding: 0px;
            margin: 0px;
            font-size: 16px;
        }

        .detail {
            background-color: #F5F5FB;
            /*border: 1px solid white;*/
            /*height: 38px;*/
            overflow: hidden;
        }

        .detail p {
            margin: 0px;
            padding: 10px;
            font-size: 13px;
            width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fronts-tools p {
            width: 340px;
        }

        .list {
            /*height: 500px;*/
            background: #fff;
            border-top: 1px solid #861146;
        }



        .header {
            padding: 15px;
            border-bottom: 1px solid #F2F2F2;
            /*margin-bottom: 5px;*/
        }

        .right-list {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .no {
            font-size: 34px;
            flex: 29.08px;
            color: rgba(0, 0, 0, .15) !important;
            fill: rgba(0, 0, 0, .15) !important;
        }

        .description {
            flex: 255px;
        }

        .footer {
            margin-top: 60px;
            background: #1B1C1C;
            color: white;
        }

        .info {
            border-bottom: 1px solid #3D3E3E;
            margin-top: 20px;
        }

        .column {
            height: 129px;
        }

        .column p {
            font-size: 0.931em;
        }

        .info h4 {
            font-size: 1.221em;
            text-align: center;
            margin-bottom: 18px;
        }

        .copyright {
            color: #87878A;
        }

        .me {
            padding: 20px;
        }
    </style>
</head>

<body>
@include('layouts._header')
<div class="container">
    @yield('content')
</div> <!-- /container -->
@include('layouts._footer')
</body>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="https://v3.bootcss.com/assets/js/vendor/jquery.min.js"><\/script>')
</script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?e659e6a47a0d8ff159fe99fa1808454e";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

@yield('script')

</html>
