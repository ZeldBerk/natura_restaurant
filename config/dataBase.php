<?php

class DataBase{
    public static function connect($host='localhost',$user='root',$pasword='',$db='natura_restaurant'){
        $con = new mysqli($host,$user,$pasword,$db);
        if ($con == false) {
            die('DATABASE ERROR');
        }else{
            return $con;
        }
    }
}
?>