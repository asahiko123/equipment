<?php

namespace App\Services;

class CheckFormData{

    public static function CheckBorrowed($data){

        if($data->borrowed ===1){
            $borrowed ="1号機+アダプタ+バッテリー";
            
        }
        if($data->borrowed ===2){
            $borrowed ="2号機+アダプタ+バッテリー";
            
        }
        if($data->borrowed ===3){
            $borrowed ="3号機+アダプタ+バッテリー";
            
        }
        if($data->borrowed ===4){
            $borrowed ="4号機+アダプタ+バッテリー";
            
        }
        if($data->borrowed ===5){
            $borrowed ="5号機+アダプタ+バッテリー";
           
        }
        if($data->borrowed ===6){
            $borrowed ="6号機+アダプタ+バッテリー";
        }
        if($data->borrowed ===7){
            $borrowed ="7号機+アダプタ+バッテリー";
        }
        if($data->borrowed ===8){
            $borrowed ="8号機+アダプタ+バッテリー";
        }
        if($data->borrowed ===9){
            $borrowed ="9号機+アダプタ+バッテリー";
        }
        if($data->borrowed ==10){
            $borrowed ="書籍";
        }

        return $borrowed;
    }

    public static function CheckConfirmed($data){
        
        if($data->confirmed ===0){
            $confirmed ="貸出中";
        }
        if($data->confirmed ===1){
            $confirmed ="返却済み";
        }
        return $confirmed;
    }

}