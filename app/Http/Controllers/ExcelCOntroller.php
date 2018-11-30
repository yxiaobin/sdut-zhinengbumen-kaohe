<?php

namespace App\Http\Controllers;

use App\Member;
use App\School;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelCOntroller extends Controller
{
    //Excel文件导出功能model
        public function export(){
            $cellData = [
                ['学号','姓名','成绩'],
                ['10001','AAAAA','99'],
                ['10002','BBBBB','92'],
                ['10003','CCCCC','95'],
                ['10004','DDDDD','89'],
                ['10005','EEEEE','96'],
            ];
            Excel::create('学生成绩',function($excel) use ($cellData){
                $excel->sheet('score', function($sheet) use ($cellData){
                    $sheet->rows($cellData);
                });
            })->export('xls');
        }
      //学生代表导入功能
    public function  import(Request $request){
        $file = $request->file('file');
        $termid = $request->input('termid');
        //dd($termid);
        if($file == null){
            echo "<script>alert('请选择上传的文件！')</script>";
            echo "<script> window.location.href=\" ".url("membermanager")." \"; </script> ";
        }
        $request->file('file')->store('file');

       $data =  Excel::load($file, function($reader){ })->first()->toArray();
       //写入数据表中
        foreach($data as $key)
        {
            $i =0;
            $flag_stuid = 0;
            $member = new Member();
            $member->term_id = $termid ;
            foreach ($key as $p)
            {
                if($i==0){
                    $flag_stuid = $p;
                    $member->stuid = $p;
                }
                if($i==1){
                    $member->name = $p;
                }
                if($i==2){
                    $member->sex = $p;
                }
                if($i==3){
                    $school = School::where('name',"=",$p)->get();
//                    dd($school);
                    if(count($school) > 0){
                        $school = $school->first();
                        $member->school_id = $school->id;
                    }else{
                        $member->school_id = null;
                    }
                }
                if($i==4){
                    $member->grade = $p;
                }
                if($i==5){
                    $member->phone = $p;
                }
                $i++;
            }
            $key = Member::where('stuid','=',$flag_stuid)->get();
            //dd($key);
//           根据学号 防止重复添加
            if(count($key) == 0 &&  $member->school_id != null){

                    $member->save();
            }

        }

        return  back();
    }

}
