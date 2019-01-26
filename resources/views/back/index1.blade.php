@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card-header">
                {{--<a href="{{url("/adminindex")}}">--}}
                    {{--<input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="综合评价">--}}
                    {{--<input   type="button" class="btn btn-primary" value="综合评价">--}}
                {{--</a>--}}
                <a href="{{url("/pjall")}}">
                    <input   type="button" class="btn btn-primary" value="评价汇总表">
                </a>
                <a href="{{url("/member")}}">
                    <input type="button" class="btn btn-primary" value="评价明细表">
                </a>
                <a href="{{url("/stucom")}}">
                    <input type="button" class="btn btn-primary" value="学生代表统计">
                </a>
                <a download="评价表" id="excelOut1" href="#" class="btn btn-warning">导出职能部门</a>
                <a download="评价表" id="excelOut2" href="#" class="btn btn-warning">导出学院</a>
            </div>
            <div class="card">
                <div class="card-header">学校职能部门评价</div>
                {{--学期选择--}}
                <br>
                <form class="form form-horizontal" method="post" action="{{url("/xxpj")}}" enctype="multipart/form-data" style="padding-left: 1.5%;">
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

                <div class="card-body">
                    <table  class="table" id="tbody1" border="1" >
                        <tbody id="sbody" >
                        <tr style="color: white; font-size: 14px; background-color: #3333CC">
                            <th>单位名称</th>
                            <th>评价人数</th>
                            <th colspan="2">评价等次</th>
                            <th>得分</th>


                        </tr>
                        @foreach($bumens as $p)
                            @php
                                $key = \App\BumenTerm::where("bumen_id",'=',$p->id)->where('term_id','=',$term->id)->get();
                                if(count($key) <=0){
                                    $key = new  \App\BumenTerm();
                                }else{
                                    $key = $key->first();
                                }
                            @endphp
                            <tr style="color: black; font-size: 14px;">
                                <th>{{$p->name}}</th>
                                <th>
                                    @php
                                        $members = \App\Member::where("term_id",'=',$term->id)->where("finish",'=','1')->get();
                                    @endphp
                                    {{count($members)}}
                                </th>
                                <th colspan="2">
                                    @php
                                    $z1 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','A+')->get();
                                    $z2 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','A')->get();
                                    $z3 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','A-')->get();
                                    $z4 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','B+')->get();
                                    $z5 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','B')->get();
                                    $z6 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','B-')->get();
                                    $z7 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','C+')->get();
                                    $z8 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','C')->get();
                                    $z9 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','C-')->get();
                                    $z10 = \App\BumenForm::where('term_id','=',$term->id)->where("bumen_id",'=',$p->id)->where("p1",'=','D')->get();
                                    @endphp

                                    A+ ({{count($z1)}});
                                    A  ({{count($z2)-4}});
                                    A- ({{count($z3)}});
                                    B+ ({{count($z4)}});
                                    B  ({{count($z5)}});
                                    B- ({{count($z6)}});
                                    C+ ({{count($z7)}});
                                    C  ({{count($z8)}});
                                    C- ({{count($z9)}});
                                    D  ({{count($z10)}});

                                    {{--A+({{$key->p1A}});--}}
                                    {{--A({{$key->p2A}});--}}
                                    {{--A-({{$key->p3A}});--}}
                                    {{--B+({{$key->p1B}});--}}
                                    {{--B({{$key->p2B}});--}}
                                    {{--B-({{$key->p3B}});--}}
                                    {{--C+({{$key->p1C}});--}}
                                    {{--C({{$key->p2C}});--}}
                                    {{--C-({{$key->p3C}});--}}
                                    {{--D({{$key->p2D}})--}}
                                    @php
                                       $zongji = count($z1)+count($z2)+count($z3)+count($z4)+count($z5)+
                                    count($z6)+count($z7)+count($z8)+count($z9)+count($z10)-4;
                                    @endphp
                                    总计:{{$zongji}}
                                </th>
                                <th>
                                    @php
                                    $sum = (100*count($z1))+(95*(count($z2)-4))+(90*count($z3))
                                    +(85*count($z4))+(80*count($z5))+(75*count($z6))
                                    +(70*count($z7))+(65*count($z8))+(60*count($z9))
                                    +(50*count($z10));
                                    $ans = count($members);
                                     if($ans !=0){
                                            $num = sprintf("%.2f",$sum/$ans);
                                     }else{
                                            $num = sprintf("%.2f",0);
                                     }
                                    @endphp
                                    {{$num}}

                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="card">
                <div class="card-header">学院评价</div>
                <div class="card-body">
                    <table  class="table" id="tbody2" border="1" >
                        <tbody id="sbody" >
                        <tr style="color: white; font-size: 14px; background-color: #3333CC">
                            <th>单位名称</th>
                            <th>评价人数</th>
                            <th colspan="2">评价等次</th>
                            <th>得分</th>

                        </tr>

                        @foreach($schools as $p)
                            @php
                                $key = \App\SchoolTerm::where("school_id",'=',$p->id)->where('term_id','=',$term->id)->get();
                                if(count($key) <=0){
                                    $key = new  \App\SchoolTerm();
                                    $key->p1A=$key->p1B=$key->p1C=$key->p1D=0;
                                    $key->p2A=$key->p2B=$key->p2C=$key->p2D=0;
                                    $key->p3A=$key->p3B=$key->p3C=$key->p3D=0;
                                    $key->p4A=$key->p4B=$key->p4C=$key->p4D=0;
                                    $key->p5A=$key->p5B=$key->p5C=$key->p5D=0;

                                }else{
                                    $key = $key->first();
                                }
                            @endphp
                            <tr style="color: black; font-size: 14px;">
                                <th>{{$p->name}}</th>
                                <th>
                                    @php
                                        $members = \App\Member::where("term_id",'=',$term->id)->where("finish",'=','1')->where("school_id",'=',$p->id)->get();
                                    @endphp
                                    {{count($members)}}
                                </th>
                                <th colspan="2">

                                    A+({{$key->p1A}});
                                    A({{$key->p2A}});
                                    A-({{$key->p3A}});
                                    B+({{$key->p1B}});
                                    B({{$key->p2B}});
                                    B-({{$key->p3B}});
                                    C+({{$key->p1C}});
                                    C({{$key->p2C}});
                                    C-({{$key->p3C}});
                                    D({{$key->p2D}})
                                    @php
                                        $zongji = $key->p1A+$key->p2A+$key->p3A+$key->p1B+$key->p2B+$key->p3B
                                         +$key->p1C+$key->p2C+$key->p3C+$key->p2D;
                                    @endphp
                                    总计:{{$zongji}}
                                </th>
                                <th>
                                    @php
                                        $sum = (100*$key->p1A)+(95*$key->p2A)+(90*$key->p3A)
                                        +(85*$key->p1B)+(80*$key->p2B)+(75*$key->p3B)
                                        +(70*$key->p1C)+(65*$key->p2C)+(60*$key->p3C)
                                        +(50*$key->p2D);
                                        $ans = count($members);
                                        if($ans !=0){
                                            $num = sprintf("%.2f",$sum/$ans);
                                        }else{
                                            $num = sprintf("%.2f",0);
                                        }

                                    @endphp
                                    {{$num}}

                                </th>
                            </tr>
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

