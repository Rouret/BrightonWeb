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
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/unique" type="text/css"/> 
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/futura-renner" type="text/css"/> 

    <link rel='stylesheet' type='text/css' media='screen' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./vendor/fullcalendar/core/main.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./vendor/fullcalendar/daygrid/main.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./vendor/fullcalendar/timegrid/main.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/myFramework.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'> 

    <script src='./js/jquery.js'></script>
    <!-- CALENDAR TEST -->
    <!-- <script src="./js/dhtmlxscheduler.js"></script> -->
    
    <script src='./vendor/fullcalendar/core/main.js'></script>
    <script src='./vendor/fullcalendar/daygrid/main.js'></script>
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
                    if(array_search($screen,$array)!==FALSE){
                        include_once("./screens/".$screen.".php"); 
                    }else{
                        header("Location: ../errors/error.php?error=404");
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

    <script src='./js/custom.js'></script>
</body>
</html>