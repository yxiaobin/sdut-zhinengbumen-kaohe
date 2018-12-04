<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\Array_;
use Qcloud\Sms\SmsSingleSender;

class MemberController extends Controller
{
    //
    public function  index(){
        $members = Member::all();
        $z1 = $z2 = $z3 =$z4 = -1;
        return view("member.index",compact('members','z1','z2','z3','z4'));
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
        return view("back.member",compact('members','z1','z2','z3','z4'));
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
        //短信应用SDK AppID
        $appid = 1400068571; // 1400开头

        // 短信应用SDK AppKey【未设置】
        $appkey = "9ff91d87c2cd7cd0ea762f141975d1df37481d48700d70ac37470aefc60f9bad";

        // 短信模板ID，需要在短信应用中申请【未设置】
        $templateId = 7839;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
        $smsSign = "腾讯云"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`

        //网站的目录
        $url = 'pj.budgroup.cn/';

        for ($i=0; $i<count($request['keys']); $i++) {
//          $request['keys'][0] = 'start?aWQ9MTAy';   Request中存取了什么
            切割学号与id号
            $result = explode('@', $request['keys'][$i]);
//          构造网站
            $html = $url .$result[0];
//          寻找member
            $res = Member::where('id', '=',$result[1])->get()[0];   // 遍历删除
//          构造电话号码表
            $phoneNumbers = [$res->phone];
//          构造参数表
            $params = [$html];
//          发送
            try {
                $ssender = new SmsSingleSender($appid, $appkey);
                $result = $ssender->sendWithParam("86", $phoneNumbers[0], $templateId,
                    $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
                $rsp = json_decode($result);
                echo $result;
            } catch(\Exception $e) {
                echo var_dump($e);
            }
        }
        if ($res) {
            $data = [
                'status' => 0,
                'msg' =>'发送成功'
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

