<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    //
    public function index(){
        $members = Term::all();
        $tab = 1;
        return  view("term.index",compact('members','tab'));
    }
    public function store(Request $request){
        $tab = 2;
        $this->validate($request,[
            'name'=>'required',
        ]);
        $member = new Term();
        $member->name = $request->input('name'); //用户名
        $member->save();
        $tab=1;
        return redirect('termmanager');
    }
    public function delete(Term  $id){
        $id->delete();
        return back();
    }
}
