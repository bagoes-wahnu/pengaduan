<?php

namespace App\Helpers;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class Helper{

    // public static function IDGenerator($model,$trow, $length = 5, $prefix){
    public static function IDGenerator($model,$trow, $length = 5){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else {
            // $code = substr($data->$trow, strlen($prefix)+1);
            // $last3 = DB::table('pengaduan')->latest('id')->select('id')->first();
            // dd($last3->id);
            $code = $data->$trow;
            $actial_last_number = ($code/1)*1;
            $increment_last_number = $actial_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
            // dd($last_number);
        }
        $zeros = "";
        for($i=0; $i<$og_length; $i++){
            // $zeros.="0";
            $zeros.=0;
        }
        // return $prefix.'-'.$zeros.$last_number;
        // dd($zeros.$last_number);
        return $zeros.$last_number;
    }
}

?>
