<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="Ohmytool 是一个分享资源、工具推荐的导航网站，是日常工作总结的实践，目的是让我们在需要的过程中超速获取。">
    <meta name="keywords" content="php,laravel,在线文档,图书,程序员必读图书,英语,在线工具,程序员,工具,开发人员工具,小工具,API查询,文档,推荐软件,软件设计">
    <meta name="author" content="vasar">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}/">
    <title>ohmytool - 分享资源和工具推荐</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <script src="https://v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <style type="text/css">
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /*font-family: Hiragino Sans GB, "Hiragino Sans GB", Helvetica, "Microsoft YaHei", Arial, sans-serif;*/
            font-size: 14px;
            background: #F0F2F5;
            /* Margin bottom by footer height */
            margin-bottom: 230px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 220px;
            background-color: #1B1C1C;
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
            line-height: 1.5em;
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
<script>
    $(window).scroll(function() {
        var tops = $(window).scrollTop();
        // console.log(tops);
        if (tops > 60) {
            // $('.search').show("slow");
            // $('.search').show();
            $('.search').fadeIn('slow');
            $('.search').addClass('navbar  navbar-fixed-top');
        } else {
            // $('.search').hide();
            $('.search').fadeOut();
        }
    });
</script>

@yield('script')

</html>
