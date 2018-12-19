
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>山东理工大学单位年度工作考核评价 - 萌芽科技提供技术支持</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

    <!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

    <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("/diaocha/css/main.css")}}" />
    <script src="{{asset("/diaocha/js/main.js")}}"></script>
    <script type="text/javascript" src="{{asset("/layui-v2.4.5/layui/layui.all.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui-v2.4.5/layui/css/layui.css")}}">
</head>

<body>
<div class="container-fluid">
    <div class="jumbotron text-center">
        <p>山东理工大学年度工作考核评价</p>
        <h2>调查问卷</h2>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">注意事项</div>
        <div class="card-body">
            <ul>
                <li>评议等次共分为10个等级，分别为A+ A A- B+ B B- C+ C C- D,每一栏目十个选项只能选择一项</li>
                <li>为更好地、准确地评价单位的履职尽责情况，请认真对每一栏目进行评价</li>
            </ul>
        </div>
    </div>
</div>
<br>

<div class="container">
    <button type="button" class="btn btn-primary btn-block" id="start">开始答卷</button>
</div>
<script type="text/javascript">
    var del = document.getElementById("start");
    del.addEventListener('click', function () {
        var paramsString = window.location.search;
        console.log(paramsString);
        paramsString  = paramsString.substring(1); //"?id=zzzzzzzzzz"
        console.log(paramsString);
        var decodeData = window.decodeURIComponent(window.atob(paramsString))//解码。
        decodeData = decodeData.substring(3);
        console.log(decodeData);

        var layer = layui.layer;
        layer.confirm('你已经做好准备答题了吗？', {
            btn: ['确定', '取消'],
        }, function() {
            $.post("{{ url("content/") }}"+'/'+decodeData , {
                "_token": "{{ csrf_token() }}",
            }, function(data) {
                if (data.status == 1) {
                    layer.msg(data.msg, { icon: 6});
                    var turnForm = document.createElement("form");
                    //一定要加入到body中！！
                    document.body.appendChild(turnForm);
                    turnForm.method = 'post';
                    turnForm.action = "{{url('dati')}}";
                    //创建隐藏表单
                    var newElement = document.createElement("input");
                    newElement.setAttribute("name","_token");
                    newElement.setAttribute("type","hidden");
                    newElement.setAttribute("value","{{csrf_token()}}");
                    turnForm.appendChild(newElement);

                    newElement = document.createElement("input");
                    newElement.setAttribute("name","stuid");
                    newElement.setAttribute("type","hidden");
                    newElement.setAttribute("value",data.stuid);
                    turnForm.appendChild(newElement);
                    turnForm.submit();
                } else {
                    layer.msg(data.msg, { icon: 5});
                }
                // window.location.reload();
            });
        });

    });
</script>
</body>

</html>