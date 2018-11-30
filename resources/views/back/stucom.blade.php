@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card-header">
                <a href="{{url("adminindex")}}">
                    {{--<input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="综合评价">--}}
                    <input   type="button" class="btn btn-primary" value="综合评价">
                </a>
                <a href="{{url("pjall")}}">
                    <input   type="button" class="btn btn-primary" value="评价汇总表">
                </a>
                <a href="{{url("/member")}}">
                    <input type="button" class="btn btn-primary" value="评价明细表">
                </a>
                <a href="{{url("/stucom")}}">
                    <input type="button" class="btn btn-primary" value="学生代表统计">
                </a>
                <a download="评价表" id="excelOut1" href="#" class="btn btn-primary">文件导出</a>
                {{--<a download="评价表" id="excelOut2" href="#" class="btn btn-primary">导出学院</a>--}}
            </div>
            <div class="card">
                <div class="card-header">学生代表</div>

                <div class="card-body">
                    {{--学期选择--}}
                    <br>
                    <form class="form form-horizontal" method="post" action="{{url("/stucompost")}}" enctype="multipart/form-data" style="padding-left: 1%;">
                        <thead>
                        {{csrf_field()}}
                        <th>
                            <select name="term"  style="width: 160px;height: 50px;">
                                @php
                                    $terms = \App\Term::all();
                                @endphp
                                @foreach($terms  as  $p)
                                    <option value="{{$p->id}}" @if($p->id == $term->id) selected  @endif>{{$p->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <th>
                            <input type="submit" class="btn btn-primary" value="查询">
                        </th>
                        </thead>
                    </form>
                    <br>

                    <table  class="table" id="tbody1" border="1" >
                        <tbody id="sbody" >
                        <tr  style="color: white; font-size: 14px;background-color: #3333CC">
                            <th>序号</th>
                            <th>学院</th>
                            <th>总人数</th>
                            <th>代表人数</th>
                            <th>未评价人数</th>
                            <th>比例</th>
                        </tr>
                        @php
                            $i =1;
                        @endphp
                        @foreach($schools as $p)
                            <tr style="color: black; font-size: 14px;">
                                <th>{{$i}}
                                @php
                                $i = $i+1;
                                @endphp
                                </th>
                                <th>{{$p->name}}</th>
                                <th>xxx</th>
                                <th>
                                    @php
                                    $members = \App\Member::where('school_id','=',$p->id)->get();
                                    $num1 = count($members);
                                    @endphp
                                    {{$num1}}
                                </th>
                                <th>
                                    @php
                                        $members = \App\Member::where('school_id','=',$p->id)->where('finish','=',0)->get();
                                        $num2 = count($members);
                                    @endphp
                                    {{$num2}}
                                </th>
                                <th>
                                    @php
                                        if($num1 == 0){
                                            $num = 0;
                                        }else{
                                            $num = sprintf("%.4f",($num1-$num2)/$num1);
                                        }
                                        $num = sprintf("%.4f",$num);
                                        $num = $num *100;
                                    @endphp
                                    {{$num}}%
                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>


    <script>
        window.onload = function () {
            tableToExcel1('tbody1', '职能部门评价表');
            tableToExcel2('tbody2', '各学院评价表');
        };
        //base64转码
        var base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)));
        };
        //替换table数据和worksheet名字
        var format = function (s, c) {
            return s.replace(/{(\w+)}/g,
                function (m, p) {
                    return c[p];
                });
        }
        function tableToExcel1(tableid, sheetName) {
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"' +
                'xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>'
                + '<x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets>'
                + '</x:ExcelWorkbook></xml><![endif]-->' +
                ' <style type="text/css">' +
                'table td {' +
                'border: 1px solid #000000;' +
                'width: 200px;' +
                'height: 30px;' +
                ' text-align: center;' +
                'background-color: #4f891e;' +
                'color: #ffffff;' +
                ' }' +
                '</style>' +
                '</head><body ><table class="excelTable">{table}</table></body></html>';
            if (!tableid.nodeType) tableid = document.getElementById(tableid);
            var ctx = {worksheet: sheetName || 'Worksheet', table: tableid.innerHTML};
            document.getElementById("excelOut1").href = uri + base64(format(template, ctx));
        }
        function tableToExcel2(tableid, sheetName) {
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"' +
                'xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>'
                + '<x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets>'
                + '</x:ExcelWorkbook></xml><![endif]-->' +
                ' <style type="text/css">' +
                'table td {' +
                'border: 1px solid #000000;' +
                'width: 200px;' +
                'height: 30px;' +
                ' text-align: center;' +
                'background-color: #4f891e;' +
                'color: #ffffff;' +
                ' }' +
                '</style>' +
                '</head><body ><table class="excelTable">{table}</table></body></html>';
            if (!tableid.nodeType) tableid = document.getElementById(tableid);
            var ctx = {worksheet: sheetName || 'Worksheet', table: tableid.innerHTML};
            document.getElementById("excelOut2").href = uri + base64(format(template, ctx));
        }
    </script>

@endsection

