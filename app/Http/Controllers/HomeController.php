<?php

namespace App\Http\Controllers;

use App\Http\Models\Home\HomeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function deletePeopleFromList(Request $request){
        $requsetd=$request->all();
        $result=HomeModel::deletePeopleFromList($requsetd);
        return response()->json(
            array(
                'result'=>$result
            )

        );
    }
    public function getPeopleList(Request $request){
        $requsetd=$request->all();
        $result=HomeModel::getPeopleList($requsetd);
        $rows=array();
        foreach ($result['rows'] as $k=>$v){
            $rows[]=array(
                $v->name,
                $v->height,
                $v->mass,
                $v->hair_color,
                $v->skin_color,
                $v->eye_color,
                $v->birth_year,
                $v->created,
                $v->edited,
                '<span style="color:blue;cursor:pointer;" class="people_click" people_id="'.$v->id.'">delete</span>'
            );
        }
        return response()->json(
            array(
                'draw'=>$requsetd['draw'],
                'recordsTotal'=>$result['total'],
                'recordsFiltered'=>$result['total'],
                'data'=>$rows,
            )

        );
    }
}
