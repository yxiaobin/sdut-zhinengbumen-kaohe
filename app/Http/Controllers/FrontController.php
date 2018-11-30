<?php

namespace App\Http\Controllers;

use App\Bumen;
use App\BumenForm;
use App\BumenTerm;
use App\Member;
use App\School;
use App\SchoolForm;
use App\SchoolTerm;
use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function start(){
            return view("diaocha.index");
    }
    public function dati(Request $request){
        if($request->input('stuid')!= null){
            $stuid = $request->input('stuid');
            $member = Member::where("stuid",'=',$stuid)->get()[0];
            $bumens  = Bumen::all();
            $school = School::find($member->school_id);
            return view("diaocha.s1",compact('bumens','school','member'));
        }else{
            return  back();
        }

    }
    public function index($id){
          $member = Member::where('stuid','=',$id)->get();
        if(count($member)==0){
            $data = [
                'status' => 0,
                'stuid' => null ,
                'msg' => '你没有答题的权限！'
            ];
        }else{
            $member = Member::where('stuid','=',$id)->get()[0];
            if($member->finish==1){
                $data = [
                    'status' => 2,
                    'stuid' => $member->stuid,
                    'msg' => '你已经完成答题了，不能再次答题了！'
                ];
            }
            else{
//                添加session记录此时回答问题的人
//                session(['stuid'=>$member->stuid]);
                $data = [
                    'status' => 1,
                    'stuid' => $member->stuid,
                    'msg' => '即将跳转到答题页面，请做好准备！'
                ];
            }

        }
        return $data;
    }
    public function store(Request $request)
    {
//        dd($request);
        $id = $request->input('member');
        $member = Member::find($id);
        $term = Term::find($member->term_id);
        //记录此人的填表记录
        if ($member->finish == 0) {
            //        更新部门记录
            $bumens = Bumen::all();
            for ($i = 0; $i < count($bumens); $i++) {
                $str = $i + 1;
                $p = BumenTerm::where("bumen_id", '=', $bumens[$i]->id)->where("term_id", '=', $member->term_id)->get();
                if (count($p) == 0) {
                    $p = new BumenTerm();
                    $p->term_id = $member->term_id;
                    $p->bumen_id = $bumens[$i]->id;
                } else {
                    $p = $p->first();
                }
                for ($j = 1; $j <= 5; $j++) {
                    $str = $i + 1;
                    $str = $str . $j;
//                echo $str . "        ";
                    $key = $request->input($str);
//                echo $key  . "<br>";
                    if ($j == 1) {
                        if ($key == 'A') {
                            $p->p1A = $p->p1A + 1;
                        } elseif ($key == 'B') {
                            $p->p1B = $p->p1B + 1;
                        } elseif ($key == 'C') {
                            $p->p1C = $p->p1C + 1;
                        } elseif ($key == 'D') {
                            $p->p1D = $p->p1D + 1;
                        }
                    }
                    if ($j == 2) {
                        if ($key == 'A') {
                            $p->p2A = $p->p2A + 1;
                        } elseif ($key == 'B') {
                            $p->p2B = $p->p2B + 1;
                        } elseif ($key == 'C') {
                            $p->p2C = $p->p2C + 1;
                        } elseif ($key == 'D') {
                            $p->p2D = $p->p2D + 1;
                        }
                    }
                    if ($j == 3) {
                        if ($key == 'A') {
                            $p->p3A = $p->p3A + 1;
                        } elseif ($key == 'B') {
                            $p->p3B = $p->p3B + 1;
                        } elseif ($key == 'C') {
                            $p->p3C = $p->p3C + 1;
                        } elseif ($key == 'D') {
                            $p->p3D = $p->p3D + 1;
                        }
                    }
                    if ($j == 4) {
                        if ($key == 'A') {
                            $p->p4A = $p->p4A + 1;
                        } elseif ($key == 'B') {
                            $p->p4B = $p->p4B + 1;
                        } else if ($key == 'C') {
                            $p->p4C = $p->p4C + 1;
                        } elseif ($key == 'D') {
                            $p->p4D = $p->p4D + 1;
                        }
                    }
                    if ($j == 5) {
                        if ($key == 'A') {
                            $p->p5A = $p->p5A + 1;
                        } elseif ($key == 'B') {
                            $p->p5B = $p->p5B + 1;
                        } elseif ($key == 'C') {
                            $p->p5C = $p->p5C + 1;
                        } elseif ($key == 'D') {
                            $p->p5D = $p->p5D + 1;
                        }
                    }
                }
                $p->updated_at = Carbon::now();
                $p->save();
            }
            //      更新学院记录
            $school = School::find($member->school_id);
            $str = 112;
            $p = SchoolTerm::where("school_id", '=', $member->school_id)->where("term_id", '=', $member->term_id)->get();
            if (count($p) == 0) {
                $p = new SchoolTerm();
                $p->term_id = $member->term_id;
                $p->school_id = $school->id;
            } else {
                $p = $p->first();
            }
            for ($j = 1; $j <= 5; $j++) {
                $str = 112;
                $str = $str . $j;
                $key = $request->input($str);
                if ($j == 1) {
                    if ($key == 'A') {
                        $p->p1A = $p->p1A + 1;
                    } elseif ($key == 'B') {
                        $p->p1B = $p->p1B + 1;
                    } elseif ($key == 'C') {
                        $p->p1C = $p->p1C + 1;
                    } elseif ($key == 'D') {
                        $p->p1D = $p->p1D + 1;
                    }
                }
                if ($j == 2) {
                    if ($key == 'A') {
                        $p->p2A = $p->p2A + 1;
                    } elseif ($key == 'B') {
                        $p->p2B = $p->p2B + 1;
                    } elseif ($key == 'C') {
                        $p->p2C = $p->p2C + 1;
                    } elseif ($key == 'D') {
                        $p->p2D = $p->p2D + 1;
                    }
                }
                if ($j == 3) {
                    if ($key == 'A') {
                        $p->p3A = $p->p3A + 1;
                    } elseif ($key == 'B') {
                        $p->p3B = $p->p3B + 1;
                    } elseif ($key == 'C') {
                        $p->p3C = $p->p3C + 1;
                    } elseif ($key == 'D') {
                        $p->p3D = $p->p3D + 1;
                    }
                }
                if ($j == 4) {
                    if ($key == 'A') {
                        $p->p4A = $p->p4A + 1;
                    } elseif ($key == 'B') {
                        $p->p4B = $p->p4B + 1;
                    } elseif ($key == 'C') {
                        $p->p4C = $p->p4C + 1;
                    } elseif ($key == 'D') {
                        $p->p4D = $p->p4D + 1;
                    }
                }
                if ($j == 5) {
                    if ($key == 'A') {
                        $p->p5A = $p->p5A + 1;
                    } elseif ($key == 'B') {
                        $p->p5B = $p->p5B + 1;
                    } elseif ($key == 'C') {
                        $p->p5C = $p->p5C + 1;
                    } elseif ($key == 'D') {
                        $p->p5D = $p->p5D + 1;
                    }
                }
            }
            $p->updated_at = Carbon::now();
            $p->save();

//
//
//        添加学生对部门的投票记录
            for ($i = 0; $i < count($bumens); $i++) {
                $str = $i + 1;
                $p = new BumenForm();
                $p->member_id = $member->id;
                $p->term_id = $member->term_id;
                $p->bumen_id = $bumens[$i]->id;
                for ($j = 1; $j <= 5; $j++) {
                    $str = $i + 1;
                    $str = $str . $j;
                    $key = $request->input($str);
                    if ($j == 1) {
                        $p->p1 = $key;
                    } else if ($j == 2) {
                        $p->p2 = $key;
                    } else if ($j == 3) {
                        $p->p3 = $key;
                    } else if ($j == 4) {
                        $p->p4 = $key;
                    } else if ($j == 5) {
                        $p->p5 = $key;
                    }
                }
                $p->updated_at = Carbon::now();
                $p->save();
            }

//        添加学生对学院的投票记录
            $p = new SchoolForm();
            $p->term_id = $member->term_id;
            $p->school_id = $school->id;
            $p->member_id = $member->id;
            for ($j = 1; $j <= 5; $j++) {
                $str = 112;
                $str = $str . $j;
                $key = $request->input($str);
                if ($j == 1) {
                    $p->p1 = $key;
                } else if ($j == 2) {
                    $p->p2 = $key;
                } else if ($j == 3) {
                    $p->p3 = $key;
                } else if ($j == 4) {
                    $p->p4 = $key;
                } else if ($j == 5) {
                    $p->p5 = $key;
                }
            }
            $p->updated_at = Carbon::now();
            $p->save();
//            将其置位1
            $member->finish = 1;
            $member->save();
            //       返回
            return redirect('finish');
        }
        else {
            echo "<script>alert('你已经答过问卷了，请不要重复回答')</script>";
            echo "<script> window.location.href=\" ".url("finish")." \"; </script> ";

        }
    }

    public function finish(){
        return  view("diaocha.finish");
    }
}
