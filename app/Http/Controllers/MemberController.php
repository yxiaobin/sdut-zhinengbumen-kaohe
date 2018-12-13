<?php

namespace App\Http\Controllers;

use App\Member;
use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mrgoon\AliSms\AliSms;
use PhpParser\Node\Expr\Array_;
use Qcloud\Sms\SmsSingleSender;

class MemberController extends Controller
{
    //
    public function  index(){
        $members = Member::paginate(200);
        $z1 = $z2 = $z3 =$z4 = -1;
        $flag  = 1;
        return view("member.index",compact('members','z1','z2','z3','z4','flag'));
    }
    public  function  store(Request $request){
        $z1 = $request->input("stuid");
        if($z1 != null){
            $members = Member::where('stuid',"like",'%'.$z1.'%')->get();
        }else{
            $members = Member::all();
        }
        //dd($members);
        $z2 = $request->input("term");
        if($z2 != -1){
            $members = $members->where('term_id','=',$z2);

        }
        //dd($members);
        $z3 = $request->input("school");
        //dd($z);
        if($z3 != -1 && count($members)>0){
            $members = $members->where('school_id','=',$z3);

        }

//
        $z4 = $request->input("finish");
        if($z4 != -1&& count($members)>0){
            $members = $members->where('finish','=',$z4);
        }
        $flag  =  0 ;
        return view("member.index",compact('members','z1','z2','z3','z4','flag'));
    }


//  模板下载
    public  function  download(){
        $pathToFile = realpath(base_path('public')).'/model.xls';
        return response()->download($pathToFile);
    }
//批量删除
    public  function  delmany(Request $request){
        for ($i=0; $i<count($request['keys']); $i++) {
            $res = Member::where('id', '=',$request['keys'][$i])->get()[0]->delete();   // 遍历删除
        }
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        } else {

            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        return $data;
    }
//发送短信
    public  function  sendmsg(Request $request){
        $bmsg = "除去已完成答题或短信已经发送次数到达三次者之外全部已发送";
        for ($i=0; $i<count($request['keys']); $i++) {
//          $request['keys'][0] = 'start?aWQ9MTAy';   Request中存取了什么
//          切割学号与id号
            $result = explode('@', $request['keys'][$i]);
//          构造网站
            $html = $result[0];
//          寻找member
            $res = Member::where('id', '=',$result[1])->get()[0];   // 遍历删除
            if ($res->finish == 0 && $res->message_num <3) {
//           发送次数加1
                $res->message_num = $res->message_num +1;
                $res->updated_at = Carbon::now();
                $res->save();
                //构造电话号码
                $phoneNumbers = $res->phone;
//            构造学期
                $term= Term::find($res->term_id);
//          发送
                $aliSms = new AliSms();
                $res = $aliSms->sendSms($phoneNumbers, 'SMS_152281024', ['year' => $term->name, 'code' => $result[0]]);
            }

        }
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => $bmsg
            ];
        } else {

            $data = [
                'status' => 1,
                'msg' => '发送失败'
            ];
        }
        return $data;
    }

}

