<?php

namespace App\Http\Controllers;

use App\Bumen;
use Illuminate\Http\Request;

class BumenController extends Controller
{
    //
    public function index(){
        $members = Bumen::all();
        $tab = 1;
        return  view("bumen.index",compact('members','tab'));
    }
    public function store(Request $request){
        $tab = 2;
        $this->validate($request,[
            'name'=>'required',
        ]);
        $member = new Bumen();
        $member->name = $request->input('name'); //用户名
        $member->save();
        $tab=1;
        return redirect('bumenmanager');
    }
    public function delete(Bumen  $id){
        $id->delete();
        return back();
    }
}
