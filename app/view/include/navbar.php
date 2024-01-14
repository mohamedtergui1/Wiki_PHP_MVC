<div class="container-fluid bg-primary sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="<?=APP_URL?>home" class="navbar-brand">
                    <h1 class="text-white">Wi<span class="text-dark">.</span>Ki</h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?=APP_URL?>home" class="nav-item nav-link">Home</a>
                        <a href="<?=APP_URL?>about" class="nav-item nav-link">About</a>
                        <a href="<?=APP_URL?>contact" class="nav-item nav-link">Contact</a>
                        <?php if ($idFromSession  ) {?>
                         <a href="<?=APP_URL?>profil" class="nav-item nav-link border p-2 "><?= $infoUser->username?></a>
                        <div class="nav-item dropdown">
                        
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><img style="height:2.5rem;"  class="rounded " src="<?=APP_URL . "public/asset/usersImage/" . $infoUser->image?>" alt="profile"></a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="" class="dropdown-item">profile</a>
                                <?php
                            if($admin){ ?>
                                <a href="<?=APP_URL?>dashboard" >Dashboard</a>
                                <?php } else {  ?>
                                    <a class="dropdown-item cursor-pointer " href="<?=APP_URL?>addwiki" > Add  Wiki </a>
                                <?php }?>
                                <li id="logOut" class="dropdown-item cursor-pointer "> Log Out</li>
                                <?php }else  {?>
                           
                                 
                                    <a href="<?=APP_URL?>signin" class="nav-item nav-link">Sign IN</a>
                                     <a href="<?=APP_URL?>signup"  class="nav-item nav-link">Sign Up</a>
                                 
                                <?php   } ?>
                    </div>
                        </div>
                </div>
            </nav>
        </div>
    </div>
    
    
