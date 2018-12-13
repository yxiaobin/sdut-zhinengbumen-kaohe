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
            'total'=>'required',
        ]);
        $member = new School();
        $member->name = $request->input('name'); //用户名
        $member->total = $request->input('total'); //用户名
        $member->term_id = 1;
        $member->save();
        $tab=1;
        return redirect('schoolmanager');
    }
    public function delete(School  $id){
        $id->delete();
        return back();
    }
    public function show($id){
        $school = School::find($id);
        return  view("school.info",compact('school'));
    }
    public function update(Request $request , $id){
        $school = School::find($id);
        $school->name = $request->input('name'); //用户名
        $school->total = $request->input('total'); //用户名
        $school->save();
        return redirect("schoolmanager");
    }
}
