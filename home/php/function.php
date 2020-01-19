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
    function whoIsLog(){
        $str="Error";
        if(isLog()){
            switch($_SESSION["log"]){
                case "0":
                    $str="Etudiant";
                    break;
                case "1":
                    $str="Administrateur";
                    break;
            }
        }
        return $str;
    }
?>