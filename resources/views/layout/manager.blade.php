<!DOCTYPE html>
<html>
<head>
    <title>后台管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/vendor.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/flat-admin.css")}}">
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue-sky.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/red.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/yellow.css")}}">

    <link rel="stylesheet" type="text/css" href="{{asset("/layui-v2.4.5/layui/css/layui.css")}}">
    <style type="text/css">
        th::after{
            content: "" !important;
        }
    </style>
    @yield("css")
</head>
<body>
<div class="app app-default">
    <?php
    $member = \App\Admin::find(session('id'));
    ?>
    <aside class="app-sidebar" id="sidebar" style="height: auto">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="#"><span class="highlight">后台管理</span></a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li >
                    <a href="{{url("/adminindex")}}">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">控制台首页</div>
                    </a>
                </li>
                @php
                $p = \App\Admin::find(session('id')) ;

                @endphp
                @if($p->isadmin == 1)
                {{--后台管理--}}
                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">后台管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{url("/adminmanager")}}">账户管理</a></li>
                            <li><a href="{{url("schoolmanager")}}">学院管理</a></li>
                            <li><a href="{{url("/bumenmanager")}}">职能部门管理</a></li>

                            <li><a href="{{url("/termmanager")}}">学期管理</a></li>

                        </ul>
                    </div>
                </li>
                {{--学生代表管理--}}
                <li class="dropdown">
                    <a href="{{url("/membermanager")}}">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">学生代表管理</div>
                    </a>
                </li>

                 @endif
            </ul>
        </div>
    </aside>
    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">
        </div>
    </script>

    <div class="app-container">

        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-brand">
                            <img src="" width="200px">
                        </li>
                        <li class="navbar-title">后台管理系统</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
                                <p>设置</p>
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">管理员您好</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="{{url("/logout")}}">
                                            退出
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield("content")
    </div>
</div>
<script type="text/javascript" src="{{asset("/assets/js/vendor.js")}}"></script>
<script type="text/javascript" src="{{asset("/assets/js/app.js")}}"></script>
<script type="text/javascript" src="{{asset("/layui-v2.4.5/layui/layui.all.js")}}"></script>

@yield('js')
</body>
</html>