<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //
    public function index(){
        $members = School::all();
        $tab = 1;
        return  view("school.index",compact('members','tab'));
    }
    public function store(Request $request){
        $tab = 2;
        $this->validate($request,[
            'name'=>'required',
        ]);
        $member = new School();
        $member->name = $request->input('name'); //用户名
        $member->term_id = 1;
        $member->save();
        $tab=1;
        return redirect('schoolmanager');
    }
    public function delete(School  $id){
        $id->delete();
        return back();
    }
}
