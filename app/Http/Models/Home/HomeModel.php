<?php
namespace App\Http\Models\Home;
/**
 * Created by PhpStorm.
 * User: soltan
 * Date: 11/2/2018
 * Time: 1:22 AM
 */
use Illuminate\Support\Facades\DB;
class HomeModel{
    public static function getPeopleList($data){
        $params=array();
        $params[]=$data['length'];
        $params[]=$data['start'];
        $result=DB::select('SELECT count(1) as cnt FROM people LIMIT ? OFFSET ?',$params);
        $res['total']=!empty($result[0]->total)?$result[0]->total:0;
        $res['rows']=DB::select('SELECT *  FROM people LIMIT ? OFFSET ?',$params);
        return $res;

    }
    public static function deletePeopleFromList($data){

        return DB::table('people')->where('id', '=', $data['id'])->delete();

    }
}