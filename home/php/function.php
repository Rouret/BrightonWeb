<?php
    function getNav(){
        $log=$_SESSION["log"];   
        $nav=array();                       
        if($log==0){
            $nav = array("home", "depot");
        }else{
            $nav = array("home", "calendar","map","depot","users");
        }
        return $nav;
    }
    function isLog(){
        $key=false;
        if(isset($_SESSION["log"])){
            $key=true;
        }
        return $key;
    }
    function verifLog($error_url){
        if(!isLog()){
            header("Location: ".$error_url);
        }
    }
?>