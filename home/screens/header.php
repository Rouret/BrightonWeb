<nav class="navbar  navbar-dark pink bg-color">
    <a class="navbar-brand event pointer" data-target="home"><strong class="UniqueRegular">BrightonWeb</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <?php
                $nav=getNav();
                if(count($nav)!=0){
                    for($i=0;$i<count($nav);$i++){
                        echo '<li class="nav-item active pointer"><a class="nav-link event" data-target="'.$nav[$i].'">'.ucfirst($nav[$i]).'</a></li>';
                    }
                }
            ?>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item d-flex align-items-center">
                <div id="avatarHeader"></div>
            </li>
            <li class="nav-item pointer event align-items-center" data-target="settings">
                <a class="nav-link"><i class="fa fa-cog fa-3x"></i></a>
            </li>
        </ul>
    </div>
</nav>
