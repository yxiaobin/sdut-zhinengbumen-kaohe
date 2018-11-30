@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card-header">
                <a href="{{url("/adminindex")}}">
                    {{--<input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="综合评价">--}}
                    <input   type="button" class="btn btn-primary" value="综合评价">
                </a>
                <a href="{{url("/pjall")}}">
                    <input   type="button" class="btn btn-primary" value="评价汇总表">
                </a>
                <a href="{{url("/member")}}">
                    <input type="button" class="btn btn-primary" value="评价明细表">
                </a>
                <a href="{{url("/stucom")}}">
                    <input type="button" class="btn btn-primary" value="学生代表统计">
                </a>
                <a download="评价表" id="excelOut1" href="#" class="btn btn-primary">导出职能部门</a>
                <a download="评价表" id="excelOut2" href="#" class="btn btn-primary">导出学院</a>
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
                            <th>评价项目</th>
                            <th>工作理念</th>
                            <th>工作作风</th>
                            <th>工作规范</th>
                            <th>工作效率</th>
                            <th rowspan="2"  style="vertical-align: middle">综合评价</th>
                        </tr>
                        <tr  style="color: white; font-size: 14px;background-color: #3333CC">
                            <th>评价内容</th>
                            <th>工作设计体现“以学生为本”</th>
                            <th>服务热情&nbsp;解决问题</th>
                            <th>依规办事&nbsp;公平公正</th>
                            <th>流程简洁&nbsp;办理高效</th>
                            {{--<th>综合评价</th>--}}
                        </tr>
                        <tr style="color: white; font-size: 14px;background-color:  #3333CC">
                            <th>单位名称</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>

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
                                    A({{$key->p1A}});
                                    B({{$key->p1B}});
                                    C({{$key->p1C}});
                                    D({{$key->p1D}})
                                </th>
                                <th>
                                    A({{$key->p2A}});
                                    B({{$key->p2B}});
                                    C({{$key->p2C}});
                                    D({{$key->p2D}})
                                </th>
                                <th>
                                    A({{$key->p3A}});
                                    B({{$key->p3B}});
                                    C({{$key->p3C}});
                                    D({{$key->p3D}})
                                </th>
                                <th>
                                    A({{$key->p4A}});
                                    B({{$key->p4B}});
                                    C({{$key->p4C}});
                                    D({{$key->p4D}})
                                </th>
                                <th>
                                    A({{$key->p5A}});
                                    B({{$key->p5B}});
                                    C({{$key->p5C}});
                                    D({{$key->p5D}})
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
                            <th>评价项目</th>
                            <th>工作理念</th>
                            <th>工作作风</th>
                            <th>工作规范</th>
                            <th>工作效率</th>
                            <th rowspan="2"  style="vertical-align: middle">综合评价</th>
                        </tr>
                        <tr  style="color: white; font-size: 14px;background-color: #3333CC">
                            <th >评价内容</th>
                            <th >重视育人氛围建设，关心学生发展，工作设计体现“以学生为本”。</th>
                            <th >经常深入基层，听取学生意见建议，及时解决问题</th>
                            <th >重视学院发展和教风学风建设，为学生发展创造良好条件。</th>
                            <th >制度完善，涉及学生利益问题公平公开公正</th>
                            {{--<th>综合评价</th>--}}
                        </tr>
                        <tr style="color: white; font-size: 14px;background-color:  #3333CC">
                            <th>单位名称</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
                            <th>评价等次</th>
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
                                    A({{$key->p1A}});
                                    B({{$key->p1B}});
                                    C({{$key->p1C}});
                                    D({{$key->p1D}})
                                </th>
                                <th>
                                    A({{$key->p2A}});
                                    B({{$key->p2B}});
                                    C({{$key->p2C}});
                                    D({{$key->p2D}})
                                </th>
                                <th>
                                    A({{$key->p3A}});
                                    B({{$key->p3B}});
                                    C({{$key->p3C}});
                                    D({{$key->p3D}})
                                </th>
                                <th>
                                    A({{$key->p4A}});
                                    B({{$key->p4B}});
                                    C({{$key->p4C}});
                                    D({{$key->p4D}})
                                </th>
                                <th>
                                    A({{$key->p5A}});
                                    B({{$key->p5B}});
                                    C({{$key->p5C}});
                                    D({{$key->p5D}})
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

