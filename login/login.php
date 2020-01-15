
<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connexion BrigthonAPP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <!--===============================================================================================-->
</head>
<body>
    <div class="wrapper">
        <div class="login">
            <form method="post" action="./www/Acces.php" id="form">
                <p class="title">Connexion BrigthonAPP</p>
                <input type="text" name="login" placeholder="Email" id="login" autofocus/>
                <i class="fa fa-user"></i>

                <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" />
                <i class="fa fa-key"></i>

                <!-- <a href="#">Forgot your password?</a> -->
                <!--<input type="submit" class="state" id="submit" value="Connexion"> -->
                <button  id="submit">
                  <span class="state">Connexion</span>
                </button>
            </form>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="customModal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/hash.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
