@extends("layout.manager")
@section("content")
    <?php
    $flag = 0;
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">学院信息修改</div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{url("schoolmanager/$school->id")}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="col-md-3 control-label">学院名称</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="例如:计算机科学与技术学院" name="name" value="{{$school->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">学院总人数</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="例如:2333" name="total" value="{{$school->total}}">
                            </div>
                        </div>
                        <div class="form-footer">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" value="确定修改">
                                    <input type="button" class="btn btn-default" value="取消">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection