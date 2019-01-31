<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .content {
            border: 1px solid gray;
            height: 500px;
        }

        .tools {
            border: 1px solid gray;
            border-radius: 5px;
        }

        .tools ul {

        }
        .tools ul li {
            /*float: left;*/
            display: inline-block;
            padding: 10px;
        }

    </style>
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" ><a href="#">Home</a></li>
                <li role="presentation"><a href="#news">API文档</a></li>
                <li role="presentation"><a href="#contact">常用工具</a></li>
                <li role="presentation"><a href="#contact">软件推荐</a></li>
                <li role="presentation"><a href="#contact">名博客</a></li>
                <li role="presentation"><a href="#contact">英语学习</a></li>
                <li role="presentation"><a href="#about">关于</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Ohmytool</h3>
    </div>

    <div class="row">
        <!-- 左边 -->
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    API文档
                </a>
                <a class="list-group-item" href="https://mp.weixin.qq.com/wiki" target="__blank">微信公众平台文档</a>
                <a class="list-group-item" href="https://docs.alipay.com/mini/introduce" target="__blank">支付宝小程序</a>
                <a class="list-group-item" href="https://docs.alipay.com/fw/api" target="__blank">支付宝生活号</a>
                <a class="list-group-item" href="https://docs.open.alipay.com/api" target="__blank">支付宝API</a>
                <a class="list-group-item" href="https://docs.open.alipay.com/api" target="__blank">支付宝API</a>
                <a class="list-group-item" href="https://docs.open.alipay.com/api" target="__blank">支付宝API</a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    名博客
                </a>
                <a class="list-group-item" href="https://coolshell.cn/" target="__blank">酷壳<span class="badge">14</span></a>
                <a class="list-group-item" href="http://www.laruence.com/" target="__blank">风雪之隅<span class="badge">14</span></a>
                <a class="list-group-item" href="http://www.ruanyifeng.com/blog/" target="__blank">阮一峰的网络日志<span class="badge">14</span></a>
                <a class="list-group-item" href="http://www.laruence.com/" target="__blank">风雪之隅<span class="badge">14</span></a>
            </div>
        </div>
        <!-- 右边 -->
        <div class="col-md-8">
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    常用工具
                </a>
                <ul>
                    <li><a href="https://tool.lu/coderunner/" target="__blank">在线运行代码</a></li>
                    <li><a href="https://tool.lu/regex/" target="__blank">正则测试工具</a></li>
                    <li><a href="https://tool.lu/timestamp/" target="__blank">时间戳转化</a></li>
                    <li><a href="https://tool.lu/ip/" target="__blank">IP查询</a></li>
                    <li><a href="http://www.fhdq.net/" target="__blank">符号大全</a></li>
                    <li><a href="http://tool.oschina.net/commons" target="__blank">常用对照表</a></li>
                    <li><a href="http://www.unit-conversion.info/texttools/random-string-generator/" target="__blank">字符串加密</a></li>
                    <li><a href="https://cli.im/" target="__blank">生成二维码</a></li>
                </ul>
            </div>
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    英语学习
                </a>
                <ul>
                    <li><a href="https://www.rong-chang.com/" target="__blank">ESL: English as a Second Language</a></li>
                    <li><a href="https://www.rong-chang.com/" target="__blank">BBC learningenglish</a></li>
                    <li><a href="https://dictionary.cambridge.org/" target="__blank">剑桥英语词典</a></li>
                    <li><a href="https://chrome.google.com/webstore/detail/google-dictionary-by-goog/mgijmajocgfcbeboacabfgobmjgjcoja/" target="__blank">Google Dictionary 插件</a></li>
                    <li><a href="https://www.youtube.com/playlist?list=PL9BB1D7256440E08B" target="__blank">American English Pronunciation!</a></li>
                </ul>
            </div>
            <div class="list-group tools">
                <a href="#" class="list-group-item active">
                    软件推荐
                </a>
                <ul>
                    <li><a href="http://www.ifunmac.com/" target="__blank">玩转苹果</a></li>
                    <li><a href="https://www.appinn.com/" target="__blank">小众软件</a></li>
                    <li><a href="https://www.snipaste.com/" target="__blank">超实用截图软件</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <footer class="footer">
        <p>&copy; 2019 ohmytool.</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

