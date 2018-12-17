
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
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("/diaocha/css/main1.css")}}" />
    <script src="{{asset("/diaocha/js/main1.js")}}"></script>
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
            <p>请对个职能单位年度工作考核进行评价</p>
        </div>
        @php
            $x = 0;
            $y = 1;
        @endphp
        @foreach($bumens as  $bumen)
            @php
                $x = $x + 1;
                $y = 1;

                $str = $x.$y;
                $y = $y+1;
            @endphp
        <!-- 开始 -->
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">{{$bumen->name}}</li>
            <li class="list-group-item">
                <p>1.是否在工作理念上工作设计体现“以学生为本”？</p>
                <div class="chooseRow">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}A" name="{{$str}}" value="A">
                        <label class="custom-control-label" for="{{$str}}A">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}B" name="{{$str}}" value="B">
                        <label class="custom-control-label" for="{{$str}}B">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}C" name="{{$str}}" value="C">
                        <label class="custom-control-label" for="{{$str}}C">C</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="D">
                        <label class="custom-control-label" for="{{$str}}D">D</label>
                    </div>
                </div>
            </li>
            @php
                $str = $x.$y;
                $y = $y+1;
            @endphp
            <li class="list-group-item">
                <p>2.是否在工作作风上热情服务，积极解决问题？</p>
                <div class="chooseRow">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}A" name="{{$str}}" value="A">
                        <label class="custom-control-label" for="{{$str}}A">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}B" name="{{$str}}" value="B">
                        <label class="custom-control-label" for="{{$str}}B">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}C" name="{{$str}}" value="C">
                        <label class="custom-control-label" for="{{$str}}C">C</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}"value="D">
                        <label class="custom-control-label" for="{{$str}}D">D</label>
                    </div>
                </div>
            </li>
            @php
                $str = $x.$y;
                $y = $y+1;
            @endphp
            <li class="list-group-item">
                <p>3.是否在工作规范上依规办事、公平公正？</p>
                <div class="chooseRow">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}A" name="{{$str}}" value="A">
                        <label class="custom-control-label" for="{{$str}}A">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}B" name="{{$str}}" value="B">
                        <label class="custom-control-label" for="{{$str}}B">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}C" name="{{$str}}" value="C">
                        <label class="custom-control-label" for="{{$str}}C">C</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="D">
                        <label class="custom-control-label" for="{{$str}}D">D</label>
                    </div>
                </div>
            </li>
            @php
                $str = $x.$y;
                $y = $y+1;
            @endphp
            <li class="list-group-item">
                <p>4.是否在工作效率上流程简洁、办理高效？</p>
                <div class="chooseRow">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}A" name="{{$str}}" value="A">
                        <label class="custom-control-label" for="{{$str}}A">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}B" name="{{$str}}" value="B">
                        <label class="custom-control-label" for="{{$str}}B">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}C" name="{{$str}}" value="C">
                        <label class="custom-control-label" for="{{$str}}C">C</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="D">
                        <label class="custom-control-label" for="{{$str}}D">D</label>
                    </div>
                </div>
            </li>
            @php
                $str = $x.$y;
                $y = $y+1;
            @endphp
            <li class="list-group-item">
                <p>5.请对该部门年度工作考核做出综合评价</p>
                <div class="chooseRow">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}A" name="{{$str}}" value="A">
                        <label class="custom-control-label" for="{{$str}}A">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}B" name="{{$str}}" value="B">
                        <label class="custom-control-label" for="{{$str}}B">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}C" name="{{$str}}" value="C">
                        <label class="custom-control-label" for="{{$str}}C">C</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$str}}D" name="{{$str}}" value="D">
                        <label class="custom-control-label" for="{{$str}}D">D</label>
                    </div>
                </div>
            </li>
        </ul>
        <!-- 结束 -->
        <br>
        @endforeach
        <div class="jumbotron text-cente">
        <h2>第二部分</h2>
        <p>请对您自己学院的年度工作考核进行评价</p>
         </div>
        <!-- 本学院评价 开始 -->
        <ul class="list-group">
        <li class="list-group-item list-group-item-primary">{{$school->name}}</li>
        <li class="list-group-item">
            <p>1.在育人理念上是否重视育人氛围建设，关心学生发展，工作设计体现“以学生为本”？</p>
            <div class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1121A" name="1121" value="A">
                    <label class="custom-control-label" for="1121A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1121B" name="1121" value="B">
                    <label class="custom-control-label" for="1121B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1121C" name="1121" value="C">
                    <label class="custom-control-label" for="1121C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1121D" name="1121" value="D">
                    <label class="custom-control-label" for="1121D">D</label>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <p>2.在工作作风方面，是否经常深入基层，听取学生意见建议，及时解决问题？</p>
            <div class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1122A" name="1122" value="A">
                    <label class="custom-control-label" for="1122A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1122B" name="1122" value="B">
                    <label class="custom-control-label" for="1122B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1122C" name="1122" value="C">
                    <label class="custom-control-label" for="1122C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1122D" name="1122" value="D">
                    <label class="custom-control-label" for="1122D">D</label>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <p>3.在工作实效方面，是否重视学院发展和教风学风建设，为学生发展创造良好条件？</p>
            <div class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1123A" name="1123" value="A">
                    <label class="custom-control-label" for="1123A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1123B" name="1123" value="B">
                    <label class="custom-control-label" for="1123B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1123C" name="1123" value="C">
                    <label class="custom-control-label" for="1123C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1123D" name="1123" value="D">
                    <label class="custom-control-label" for="1123D">D</label>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <p>4.在工作规范方面，是否实现制度完善，涉及学生利益问题公平公开公正？</p>
            <div class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1124A" name="1124" value="A">
                    <label class="custom-control-label" for="1124A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1124B" name="1124" value="B">
                    <label class="custom-control-label" for="1124B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1124C" name="1124" value="C">
                    <label class="custom-control-label" for="1124C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1124D" name="1124" value="D">
                    <label class="custom-control-label" for="1124D">D</label>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <p>5.请对自己的学院工作考核做出综合评价</p>
            <div class="chooseRow">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1125A" name="1125" value="A">
                    <label class="custom-control-label" for="1125A">A</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1125B" name="1125" value="B">
                    <label class="custom-control-label" for="1125B">B</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1125C" name="1125" value="C">
                    <label class="custom-control-label" for="1125C">C</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="1125D" name="1125" value="D">
                    <label class="custom-control-label" for="1125D">D</label>
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
            $num = (count($bumens)+1)*5;
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