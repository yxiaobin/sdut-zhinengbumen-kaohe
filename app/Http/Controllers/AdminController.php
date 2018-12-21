<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Member;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public  function  index(){
        $members = Admin::all();
        $tab = 1;
        return  view("admin.index",compact('members','tab'));
    }
    public function store(Request $request){
        $tab = 2;
        $this->validate($request,[
            'usrname'=>'required|min:4',
            'password'=>'confirmed|min:4|max:15',
            'isadmin'=>'required',
            'islogin'=>'required',
        ]);

        $member = new Admin();
        $member->usrname = $request->input('usrname'); //用户名
        $member->password = encrypt($request->input('password'));//密码
        $member->isadmin = $request->input('isadmin');//标记状态 管理员
        $member->islogin = $request->input('islogin');//标记状态  允许登录
        $member->save();
        $tab=1;
        return redirect('adminindex');
    }
    public function  setadmin(Admin $id){
        $id->isadmin = $id->isadmin + 1;
        $id->isadmin = $id->isadmin%2;
        $id->save();
        return  back();
    }
    public function  setlogin(Admin $id){
        $id->islogin = $id->islogin + 1;
        $id->islogin = $id->islogin % 2;
        $id->save();
        return  back();
    }
    public function show($id){
        $member = Admin::find($id);
        $member->password = encrypt("666666");
        $member->save();
        return back();
    }
    public function delete(Admin $id){
        $id->delete();
        return back();
    }
}
