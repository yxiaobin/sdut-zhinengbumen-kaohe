@extends("layout.manager")

@section("css")

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        @php if(session('tab')){
                            $tab = session('tab');
                        }
                        @endphp
                        <li role="tab1" class="@if($tab==1){{"active"}}@endif">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">管理员列表</a>
                        </li>
                        <li role="tab2" style="width:160px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">添加管理员</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>是否管理员</th>
                                <th>是否允许登录后台</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>

                                    <td>{{$member->usrname}}</td>
                                    <td>
                                        @if($member->isadmin==1)
                                            <p  style="font-size: 19px; color: red">管理员</p>
                                        @else
                                            <p style="font-size: 19px; color: black">普通用户</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($member->islogin==1)
                                            <p  style="font-size: 19px; color: greenyellow">允许登录后台</p>
                                        @else
                                            <p  style="font-size: 19px; color: black">无权限</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url("deleteadmin/$member->id")}}">
                                            <input   @if($member->id == session('id'))
                                                     disabled="disabled"
                                                     @endif type="button" class="btn btn-xs btn-danger" onclick="return confirm('确认要删除吗？')" value="删除">
                                        </a>
                                        <a href="{{url("adminmanager/$member->id")}}">
                                            <input  type="button" class="btn btn-xs btn-warning" onclick="return confirm('确认要重置吗？重置后密码将变为 666666 ')" value="密码重置">
                                        </a>
                                        @if($member->isadmin == 0)
                                            <a href="{{url("setadmin/$member->id")}}">
                                                <input type="button" class="btn btn-xs btn-primary" value="设为管理员">
                                            </a>
                                        @else
                                            <a href="{{url("setadmin/$member->id")}}">
                                                <input type="button" class="btn btn-xs btn-default" value="取消管理员">
                                            </a>
                                        @endif
                                        @if($member->islogin == 0)
                                            <a href="{{url("setlogin/$member->id")}}">
                                                <input type="button" class="btn btn-xs btn-primary" value="设为允许登录">
                                            </a>
                                        @else
                                            <a href="{{url("setlogin/$member->id")}}">
                                                <input type="button" class="btn btn-xs btn-default" value="取消允许登录">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2">
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-8 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填写信息</div>
                                    <div class="section-body __indent">
                                        <form class="form form-horizontal" method="post" action="" enctype="multipart/form-data">
                                            <div class="section">
                                                <div class="section-body">
                                                    {{csrf_field()}}

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">用户名</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="用户名" name="usrname">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">密码</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="密码" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">确认密码</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="再次输入密码" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">是否设为管理员</label>
                                                        <div class="col-md-9">
                                                            <select name="isadmin" id="" class="form-control">
                                                                <option value="0">普通用户</option>
                                                                <option value="1">管理员</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">是否允许登录后台</label>
                                                        <div class="col-md-9">
                                                            {{--<input type="text" class="form-control" placeholder="密码" name="password">--}}
                                                            <select name="islogin" id="" class="form-control">
                                                                <option value="0">不允许登录</option>
                                                                <option value="1">允许登录</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-9 col-md-offset-3">
                                                                <input type="submit" class="btn btn-primary" value="添加">
                                                                <input type="button" class="btn btn-default" value="取消">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection