<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public  function index1(){
        return  redirect('login');
    }

    //
    public  function index(){
        return view("login.login");
    }
    //    验证登录逻辑
    public function  store(Request $request){
//        规则验证
        $this->validate($request,[
            'name'=>'required|min:4|max:15',
            'password'=>'required|min:4|max:15'
        ]);
//        获取输入的名字和密码
        $name = $request->input('name');
        $password = $request->input('password');
//        如果没有用户，第一次输入就相当于注册了
        if(count(Admin::all())==0) {
            $member = new Admin();
            $member->usrname = $name;
            $member->password = encrypt($password);
            $member->isadmin = 1;
            $member->islogin = 1;
            $member->save();
            session(['id'=>$member->id]);
//            返回主页
            return redirect('adminindex');
        }else{
            $member=Admin::where('usrname','=',$name)->where("islogin",'=','1')->get();
            if(count($member)<=0){
                //用户名不存在
                echo "<script>alert('用户名不存在！或你没有登录权限')</script>";
                session(['id'=>'']);
                echo "<script> window.location.href=\" ".url("login")." \"; </script> ";
            }else {
                $member = $member->first();
                if($password == decrypt($member->password)){
                    //登记session
                    session(['id'=>$member->id]);
                    return redirect('adminindex');
                }else{
                    //密码错误
                    echo "<script>alert('密码错误！')</script>";
                    session(['id'=>'']);
                    echo "<script> window.location.href=\" ".url("login")." \"; </script> ";
                }
            }
        }
    }

    public function logout(){
        session(['id'=>'']);
        return  redirect('login');
    }
}
