@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card-header">
                <a href="#">
                    <input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="导入学生代表">
                </a>
                <a href="#">
                    <input  id="delALL" type="button" class="btn btn-primary" value="删除学生代表">
                </a>
                <a href="#">
                    <input id="sendMsg" type="button" class="btn btn-primary" value="发送短信">
                </a>
            </div>
            <div class="card">
                <div class="card-header">学生代表列表</div>
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <thead>
                        {{csrf_field()}}
                        <th>
                            <select name="term" id="" style="width: 160px;height: 50px;">
                                <option value="-1">全部学年</option>
                                @php
                                    $terms = \App\Term::all();
                                @endphp
                                @foreach($terms  as  $p)
                                    <option value="{{$p->id}}" @if($z2 == $p->id)selected @endif>{{$p->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select name="school" id="" style="width: 160px;height: 50px;">
                                <option value="-1">全部院系</option>
                                @php
                                    $schools = \App\School::all();
                                @endphp
                                @foreach($schools  as  $p)
                                    <option value="{{$p->id}}" @if($z3 == $p->id)selected @endif>{{$p->name}}</option>
                                @endforeach

                            </select>
                        </th>
                        <th>
                            <select name="finish" id="" style="width: 160px;height: 50px;">
                                <option value="-1" @if($z4 == -1)selected @endif>投票结果</option>
                                <option value="1"@if($z4 == 1)selected @endif>已经投票</option>
                                <option value="0"@if($z4 == 0)selected @endif>还未投票</option>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="stuid"  placeholder="学号" style="width: 160px;height: 50px;"  value="@if($z1 !=-1 ){{$z1}}@endif">
                        </th>
                        <th>
                            <input type="submit" class="btn btn-primary" value="查询">
                        </th>
                        </thead>
                    </form>
                </div>

                <div class="card-body">
                    <table class=" table" id="tbody">
                        <thead>
                        <th id="xyz">
                                <input  type="checkbox" id="xyz"/>

                        </th>
                        <th>学期</th>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>院系</th>
                        <th>年级</th>
                        <th>手机号</th>
                        <th>是否投票</th>
                        <th>发送时间</th>
                        <th>发送次数</th>
                        </thead>
                        <tbody id="sbody">
                        {{--style="background-color: #66afe9"--}}
                        @foreach($members as $page)
                            <tr  >
                                <td>
                                        <input type="checkbox" class="ace"  value="{{$page->id}}"/>
                                </td>
                                <td>
                                    @php
                                    $term = \App\Term::find($page->term_id);
                                    @endphp
                                    {{$term->name}}
                                </td>
                                <td>
                                    {{$page->stuid}}
                                </td>
                                <td>
                                    {{$page->name}}
                                </td>
                                <td>
                                    {{$page->sex}}
                                </td>
                                <td>
                                    @php
                                    $school = \App\School::find($page->school_id);
                                    @endphp
                                    @php
                                    if($school == null ){
                                        $school = new \App\School() ;
                                        $school->name = null;
                                    }
                                    @endphp
                                    {{$school->name}}
                                </td>
                                <td>
                                    {{$page->grade}}
                                </td>
                                <td>
                                    {{$page->phone}}
                                </td>
                                <td>
                                    @if($page->finish == 0)
                                        <p style="color: red">还未投票</p>
                                    @else
                                        <p style="color:cornflowerblue">投票完成</p>
                                    @endif
                                </td>
                                <td>
                                    发送时间
                                </td>
                                <td>
                                    {{$page->message_num}}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="genID({{$page->id}})">
                                        生成特定URL
                                    </a>
                                    <script>
                                        function genID(num) {
                                            var stuid = num;
                                            // url = "stu_info.html?name=xiaoming&age=10"
                                            var ss = "id=" + stuid;
                                            console.log(ss);
                                            url = "start?"+window.btoa(ss);
                                            console.log(url);
                                            window.open(url);
                                        }
                                    </script>

                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div style="padding-left: 45%; !important;">
                        {{--{{ $members->links() }}--}}
                    </div>
                </div>
            </div>
        </div>


    </div>




    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">导入学生信息</h4>
                </div>
                <form class="form form-horizontal" method="post" action="{{url("/excel/import")}}" enctype="multipart/form-data">
                    <div class="section">
                        <div class="section-body">
                            {{csrf_field()}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label">文件格式</label>
                                <div class="col-md-9">
                                    <a href="{{url("/download")}}">
                                        <input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="下载模板">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">选择文件</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control"  name="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">选择学期</label>
                                <div class="col-md-9">
                                    <select name="termid" id="" class="form-control">
                                        @php
                                        $keys = \App\Term::all();
                                        @endphp
                                        @foreach($keys as $key)
                                        <option value="{{$key->id}}">
                                            {{$key->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <textarea name="" id="" cols="40" rows="8"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-footer">
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" class="btn btn-primary" value="添加">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    {{--实现全选监听器--}}
    <script type="text/javascript" >
        window.onload = function() {
            //获得tbody
            var tbody = document.getElementById("tbody");
            console.log(tbody);
            //先获得控制全选反选的input标签
            var inputAll = document.getElementById("xyz");
            console.log(inputAll)
            inputAll.checked=false;
            //获得tbody里面的子元素
            var icheck = tbody.getElementsByTagName("input");
            console.log("*********");

            inputAll.addEventListener('click', function() {
                inputAll.checked = !(inputAll.checked);
                for (var i = 1; i < icheck.length; i++) {
                        icheck[i].checked = inputAll.checked;
                        var p  =  icheck[i].parentNode;
                        var pp  = p.parentNode;
                        console.log(pp);
                        if(inputAll.checked == true){
                            pp.style.backgroundColor="#66afe9";
                        }else{
                            pp.style.backgroundColor="white";
                        }
                    }
            });
            for (var i = 1; i < icheck.length; i++) {
                icheck[i].addEventListener('click', function() {
                    var  flag = this.checked;
                    var p  =  this.parentNode;
                    var pp  = p.parentNode;
                    if(flag == true){
                        pp.style.backgroundColor="#66afe9";
                    }else{
                        pp.style.backgroundColor="white";
                    }
                });
            }

        }
    </script>
    {{--实现批量删除监听器--}}
    <script type="text/javascript" >
            var del = document.getElementById("delALL");
            del.addEventListener('click', function () {
                var items = [];
                //获得tbody
                var tbody = document.getElementById("tbody");
                //获得tbody里面的子元素
                var icheck = tbody.getElementsByTagName("input");
                for (var i = 1; i < icheck.length; i++) {
                    if (icheck[i].checked) {
                        console.log(icheck[i].value);
                        items.push(icheck[i].value);        // 将id都放进数组
                    }
                }
                if (items == null || items.length == 0)        // 当没选的时候，不做任何操作
                {
                    return false;
                }
                var layer = layui.layer;
                layer.confirm('您确定要删除我们吗？', {
                    btn: ['确定', '取消'],
                }, function() {
                    $.post("{{ url('/delmany') }}", {
                        "_token": "{{ csrf_token() }}",
                        "keys": items
                    }, function(data) {
                        if (data.status == 0) {
                            layer.msg(data.msg, { icon: 6});
                            location.href = location.href;
                        } else {
                            layer.msg(data.msg, { icon: 5});
                        }
                        window.location.reload();
                    });
                });

            });


    </script>

    {{--实现批量发送短信--}}
    <script type="text/javascript" >
        var del = document.getElementById("sendMsg");
        del.addEventListener('click', function () {
            var items = [];
            //获得tbody
            var tbody = document.getElementById("tbody");
            //获得tbody里面的子元素
            var icheck = tbody.getElementsByTagName("input");
            for (var i = 1; i < icheck.length; i++) {
                if (icheck[i].checked) {
                    console.log(icheck[i].value);
                    let  x =  "start?" + window.btoa("id=" + icheck[i].value);
                    x = x + '@'+ icheck[i].value;
                    console.log(window.btoa(icheck[i].value));
                    items.push(x);        // 将id都放进数组
                }
            }
            if (items == null || items.length == 0)        // 当没选的时候，不做任何操作
            {
                return false;
            }
            var layer = layui.layer;
            layer.confirm('您确定要发送短信吗？', {
                btn: ['确定', '取消'],
            }, function() {
                $.post("{{ url('/sendmsg') }}", {
                    "_token": "{{ csrf_token() }}",
                    "keys": items
                }, function(data) {
                    if (data.status == 0) {
                        layer.msg(data.msg, { icon: 6});
                        location.href = location.href;
                    } else {
                        layer.msg(data.msg, { icon: 5});
                    }
                    window.location.reload();
                });
            });

        });


    </script>
@endsection

