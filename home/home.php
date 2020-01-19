<?php
    session_start(); 
    include_once("./php/function.php");
    verifLog("../login/login.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>
        <?php
            if(isset($_GET["screen"])){
                echo ucfirst($_GET["screen"])." page";
            }else{
                echo "BrightonWeb";
            }
        ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <?php
        if(isset($_GET["screen"])){
            $screen=$_GET["screen"];
            $str_style='<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/unique" type="text/css"/> <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/futura-renner" type="text/css"/> <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
            $str_script='<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><script src="./js/jquery.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
            switch($screen){
                case "calendar":
                    $str_style.="<link rel='stylesheet' type='text/css' media='screen' href='css/dhtmlxscheduler.css'>";
                    $str_script.="<script src='./js/dhtmlxscheduler.js'></script>";
                    break;
                case "map":
                    $str_style.='<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>';
                    $str_script.='<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>';
                    break;
            }
            $str_style.='<link rel="stylesheet" type="text/css" media="screen" href="css/main.css">';
            echo $str_style;
            echo $str_script;
        }
    ?>
</head>
<body>
    <?php
        include_once("./screens/header.php");
    ?>
    <section>
        <?php
            if(isset($_GET["screen"])){
                $screen=$_GET["screen"];
                $array = getNav();
                if(count($nav)!=0){
                    if(array_search($screen,$array)!==FALSE || $screen=="settings"){
                        include_once("./screens/".$screen.".php"); 
                    }else{
                        print_r($nav);
                        // header("Location: ../errors/error.php?error=404");
                    }
                }
            }else{
                header("Location: ./home.php?screen=home");
            }
        ?>
    </section>
    <?php
        include_once("./screens/footer.php");
    ?>
    <div class="modal" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-content"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
            </div>
        </div>
    </div>
    <div id="message" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <script src='./js/custom.js'></script>
</body>
</html>