<?php

namespace App\Http\Controllers;

use App\Bumen;
use App\Member;
use App\School;
use App\Term;
use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    //综合评价
    public  function  index(){
        $bumens = Bumen::all();
        $schools = School::all();
        $term = Term::orderby('id','desc')->get();
        if(count($term) != 0){
            $term =$term->first();
        }
        return  view("back.index",compact('bumens','schools','term'));
    }
    public  function  store(Request $request){
        $bumens = Bumen::all();
        $schools = School::all();
        $term = Term::find($request->term);
        return  view("back.index",compact('bumens','schools','term'));
    }
//    评价明细表
    public  function  member(){
        $members = Member::paginate(14);
        $z1 = $z2 = $z3 =$z4 = -1;
        return view("back.member",compact('members','z1','z2','z3','z4'));
    }
    public  function  memberstore(Request $request){
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

//    各自的学院学生代表评价
    public  function  stucom(){
        $schools = School::all();
        $term = Term::orderby('id','desc')->get();
        if(count($term) != 0){
            $term =$term->first();
        }
        return  view("back.stucom",compact("schools",'term'));
    }
    public  function  stucompost(Request $request){
        $schools = School::all();
        $term = Term::find($request->term);
        return  view("back.stucom",compact("schools",'term'));
    }


//    评价汇总表
    public function  pjall(){
        $bumens = Bumen::all();
        $schools = School::all();
        $term = Term::orderby('id','desc')->get();
        if(count($term) != 0){
            $term =$term->first();
        }
        return  view("back.index1",compact('bumens','schools','term'));
    }
    public function pjallpost(Request $request){
        //dd($request);
        $bumens = Bumen::all();
        $schools = School::all();
        $term = Term::find($request->term);
        //dd($term);
        return  view("back.index1",compact('bumens','schools','term'));
    }

}
