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
            $borrowed ="10号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==11){
            $borrowed ="11号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==12){
            $borrowed ="12号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==13){
            $borrowed ="13号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==14){
            $borrowed ="14号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==15){
            $borrowed ="15号機+アダプタ+バッテリー";
        }
        if($data->borrowed ==16){
            $borrowed ="16号機+アダプタ+バッテリー";
        }
        if($data->borrowed ==17){
            $borrowed ="17号機+アダプタ+バッテリー";
        }
        if($data->borrowed ==18){
            $borrowed ="18号機+アダプタ+バッテリー";
        }
        if($data->borrowed ==19){
            $borrowed ="19号機+アダプタ+バッテリー";
        }

        if($data->borrowed ==20){
            $borrowed ="書籍";
        }

        if($data->borrowed ==21){
            $borrowed ="傘";
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
