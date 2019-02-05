<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.ohmytool.net"><img src="/logo.png" style="height: 30px; margin-top: -5px;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="/">资源</a></li>
                <li><a href="{{ route('category.index', 2) }}">在线文档</a></li>
                <li><a href="{{ route('category.index', 5) }}">博客列表</a></li>
                <li><a href="{{ route('category.index', 8) }}">常用工具</a></li>
                <li><a href="{{ route('category.index', 9) }}">推荐软件</a></li>
                <li><a href="{{ route('category.index', 6) }}">学习英语</a></li>
                {{--<li><a href="#contact">关于</a></li>--}}
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
