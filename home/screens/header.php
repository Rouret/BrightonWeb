<header>
    <div class="spaceAround row all border-b">
        <div class="flex-2 center border-r event" data-target="home">
            <h1 class="UniqueRegular">Brighton Web</h1>
        </div>
        <div class="flex-6 center-v">
            <div>
                <nav>
                    <ul class="row" id="nav">
                        <?php
                            if(isset($_SESSION["log"])){
                                $log=$_SESSION["log"];                               
                                if($log==0){
                                    $nav = array("home", "depot");
                                }else{
                                    $nav = array("home", "calendar","map","depot");
                                }
                                for($i=0;$i<count($nav);$i++){
                                    echo '<li class="event" data-target="'.$nav[$i].'">'.ucfirst($nav[$i]).'</li>';
                                }
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="flex-1 border-l">
            <div class="all center row">
                <div class="mr-1 pointer event" data-target="settings">
                    <i class="fa fa-cog fa-3x"></i>
                </div>
                <div id="avatarHeader">
                    
                </div>
            </div>
        </div>
    </div>
</header>