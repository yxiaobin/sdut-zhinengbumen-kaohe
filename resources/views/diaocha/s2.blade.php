
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>调查问卷</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

    <!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

    <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("/diaocha/css/main1.css")}}" />
    <script src="{{asset("/diaocha/js/main1.js")}}"></script>
</head>

<body>
<div class="container">

    <div class="jumbotron text-cente">
        <h2>最后</h2>
        <p>请对您自己学院的年度工作考核进行评价</p>
    </div>

    <!-- 本学院评价 开始 -->
    <ul class="list-group">
        <li class="list-group-item list-group-item-primary">数学与统计学院</li>
        <li class="list-group-item">
            <p>1.在育人理念上是否重视育人氛围建设，关心学生发展，工作设计体现“以学生为本”？</p>
            <form class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="121A" name="121">
                    <label class="custom-control-label" for="121A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="121B" name="121">
                    <label class="custom-control-label" for="121B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="121C" name="121">
                    <label class="custom-control-label" for="121C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="121D" name="121">
                    <label class="custom-control-label" for="121D">D</label>
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <p>2.在工作作风方面，是否经常深入基层，听取学生意见建议，及时解决问题？</p>
            <form class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="122A" name="122">
                    <label class="custom-control-label" for="122A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="122B" name="122">
                    <label class="custom-control-label" for="122B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="122C" name="122">
                    <label class="custom-control-label" for="122C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="122D" name="122">
                    <label class="custom-control-label" for="122D">D</label>
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <p>3.在工作实效方面，是否重视学院发展和教风学风建设，为学生发展创造良好条件？</p>
            <form class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="123A" name="123">
                    <label class="custom-control-label" for="123A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="123B" name="123">
                    <label class="custom-control-label" for="123B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="123C" name="123">
                    <label class="custom-control-label" for="123C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="123D" name="123">
                    <label class="custom-control-label" for="123D">D</label>
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <p>4.在工作规范方面，是否实现制度完善，涉及学生利益问题公平公开公正？</p>
            <form class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="124A" name="124">
                    <label class="custom-control-label" for="124A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="124B" name="124">
                    <label class="custom-control-label" for="124B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="124C" name="124">
                    <label class="custom-control-label" for="124C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="124D" name="124">
                    <label class="custom-control-label" for="124D">D</label>
                </div>
            </form>
        </li>
        <li class="list-group-item">
            <p>5.请对自己的学院工作考核做出综合评价</p>
            <form class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="125A" name="125">
                    <label class="custom-control-label" for="125A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="125B" name="125">
                    <label class="custom-control-label" for="125B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="125C" name="125">
                    <label class="custom-control-label" for="125C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="125D" name="125">
                    <label class="custom-control-label" for="125D">D</label>
                </div>
            </form>
        </li>
    </ul>
    <!-- 结束 -->
    <br>

    <div class="container">
        <br><button type="button" class="btn btn-primary btn-block" onclick="window.location.href='finish.html'">完成提交</button>
    </div>
    <br>

</div>

</body>

</html>