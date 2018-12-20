
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
    <script src="{{asset("/diaocha/js/main1.js")}}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("/diaocha/css/main1.css")}}" />


</head>

<body>
<div class="container">
    <form  id="#myForm" action="{{url("/store")}}" method="post" >
        {{csrf_field()}}
        <input type="hidden" name="member" value="{{$member->id}}">
        <div class="jumbotron text-cente">
            <h2>第一部分</h2>
            @php
                $num = count($bumens);
            @endphp
            <p>1.请对山东理工大学部分部门单位年度工作进行考核评价</p>
            <p>   2.请根据“工作体现以学生为本”、“服务热情 解决问题”、“依规办事 公平公正”和“流程简洁 办理高效”四个方面对各职能部门打分</p>
             <p>   3.评价等级A、B、C、D分别代表“好”、“较好”、“一般”、“差”；其中A+、A、A-、B+、B、B-、C+、C、C-、D分别对应100分、95分、90分、85分、80分、75分、70分、65分、60分、50分。</p>
        </div>
        @php
            $str = 0;
        @endphp
        @foreach($bumens as  $bumen)
            @php
                $str = $str + 1;
            @endphp
        <!-- 开始 -->
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">{{$bumen->name}}</li>
            <li class="list-group-item">
                <p>请对该部门年度工作考核做出综合评价</p>
                <div class="chooseRow d-flex flex-column">
                    <div class="d-flex justify-content-around lineheights" >
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}A" name="{{$str}}" value="A+">
                            <label class="custom-control-label" for="{{$str}}A">A+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}B" name="{{$str}}"value="A">
                            <label class="custom-control-label" for="{{$str}}B">A </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}C" name="{{$str}}" value="A-">
                            <label class="custom-control-label" for="{{$str}}C">A-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="B+">
                            <label class="custom-control-label" for="{{$str}}D">B+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}E" name="{{$str}}" value="B">
                            <label class="custom-control-label" for="{{$str}}E">B </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}F" name="{{$str}}" value="B-">
                            <label class="custom-control-label" for="{{$str}}F">B-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}G" name="{{$str}}" value="C+">
                            <label class="custom-control-label" for="{{$str}}G">C+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}H" name="{{$str}}" value="C">
                            <label class="custom-control-label" for="{{$str}}H">C </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}I" name="{{$str}}" value="C-">
                            <label class="custom-control-label" for="{{$str}}I">C-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}J" name="{{$str}}" value="D">
                            <label class="custom-control-label" for="{{$str}}J">D</label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <!-- 结束 -->
        <br>
        @endforeach
        <div class="jumbotron text-cente">
        <h2>第二部分</h2>
            <p>1.请对山东理工大学学院领导班子进行考核评价；</p>
            <p> 2.请根据“关心学生发展，工作设计体现以学生为本”、“经常深入基层，听取学生意见建议，及时解决问题”、“重视学院发展和教风学风建设，为学生发展创造良好条件”和“制度完善，涉及学生利益问题公平公开公正”四个方面对各职能部门打分；</p>
           <p> 3.评价等级A+、A、A-、B+、B、B-、C+、C、C-、D分别对应100分、95分、90分、85分、80分、75分、70分、65分、60分、50分；</p>
         </div>
        <!-- 本学院评价 开始 -->
        <ul class="list-group">
            @php
            $str = 110;
            @endphp
        <li class="list-group-item list-group-item-primary">{{$school->name}}</li>
            <li class="list-group-item">
                <p>请对该部门年度工作考核做出综合评价</p>
                <div class="chooseRow d-flex flex-column">
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}A" name="{{$str}}" value="A+">
                            <label class="custom-control-label" for="{{$str}}A">A+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}B" name="{{$str}}"value="A">
                            <label class="custom-control-label" for="{{$str}}B">A </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input col-sm-4" id="{{$str}}C" name="{{$str}}" value="A-">
                            <label class="custom-control-label" for="{{$str}}C">A-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="B+">
                            <label class="custom-control-label" for="{{$str}}D">B+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}E" name="{{$str}}" value="B">
                            <label class="custom-control-label" for="{{$str}}E">B </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}F" name="{{$str}}" value="B-">
                            <label class="custom-control-label" for="{{$str}}F">B-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}G" name="{{$str}}" value="C+">
                            <label class="custom-control-label" for="{{$str}}G">C+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}H" name="{{$str}}" value="C">
                            <label class="custom-control-label" for="{{$str}}H">C </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}I" name="{{$str}}" value="C-">
                            <label class="custom-control-label" for="{{$str}}I">C-</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around lineheights">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$str}}J" name="{{$str}}" value="D">
                            <label class="custom-control-label" for="{{$str}}J">D</label>
                        </div>
                    </div>
                </div>
            </li>
    </ul>
        <br>
        <input type="submit" disabled class="btn btn-primary btn-block" id="sub" value="将所有题目全部做完后方可点击提交">
        <br>
    </form>
</div>
<script type="text/javascript">
        @php
            $num = (count($bumens)+1);
        @endphp
            console.log({{$num}})
        window.onload=function () {
        var items = document.getElementsByTagName('input')
        for (i =0; i< items.length; i++){
            items[i].addEventListener("click",function () {
                    var x = 0;
                 for(j=0;j<items.length;j++){
                     if(items[j].checked==true){
                         x = x+1;
                     }
                 }
                 if( x== {{$num}}){
                     document.getElementById('sub').setAttribute('value',"提交");
                     document.getElementById('sub').removeAttribute('disabled');
                     // console.log(x+"yes");
                 }else{
                     // console.log(x+"no");
                 }
            });
        }

    }


</script>
</body>

</html>