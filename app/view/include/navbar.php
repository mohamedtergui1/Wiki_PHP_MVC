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
                      
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="feature.html" class="dropdown-item">Features</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="faq.html" class="dropdown-item">FAQs</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item active">404 Page</a>
                            </div>
                        </div> -->
                    <?php if ($idFromSession  ) {?>
                          <a href="<?=APP_URL?>profile" class="nav-item nav-link"><?=$infoUser->username?></a>
                        <div style="margin-right:1rem;"  class="collapse navbar-collapse" id="navbarCollapse" >
                     
                         
                         <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img style="height:2.5rem;"  class="rounded " src="<?=APP_URL . "public/asset/usersImage/" . $infoUser->image?>" alt="profile">
      
     
  </a>

  <ul class="dropdown-menu" >
    <li class="dropdown-item cursor-pointer ">profile</li>
    <?php
     if($admin){ ?>
    <li class="dropdown-item cursor-pointer "><a href="<?=APP_URL?>dashboard" >Dashboard</a></li>
    <?php } ?>
    <li  class="dropdown-item cursor-pointer "> <a href="<?=APP_URL?>addwiki" > Add  Wiki </a></li>
    <li id="logOut" class="dropdown-item cursor-pointer "> Log Out</li>
  </ul>
</div>
                        </div>

      <?php }else  {?>
                        <div  class="collapse navbar-collapse" id="navbarCollapse" >
                               <a href="<?=APP_URL?>signin"class="nav-item nav-link">Sign IN</a>
                                <a href="<?=APP_URL?>signup" class="nav-item nav-link">Sign Up</a>
                         </div>
                     <?php   } ?>
                    </div>
                   
                   
                </div>
            </nav>
        </div>
    </div>
    
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


body{
 background-color:#eee;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.height{
 height: 100vh;
}


.search{
position: relative;
box-shadow: 0 0 40px rgba(51, 51, 51, .1);
  
}

.search input{

 height: 60px;
 text-indent: 25px;
 border: 2px solid #d6d4d4;


}


.search input:focus{

 box-shadow: none;
 border: 2px solid blue;


}

.search .fa-search{

 position: absolute;
 top: 20px;
 left: 16px;

}

.search button{

 position: absolute;
 top: 5px;
 right: 5px;
 height: 50px;
 width: 110px;
 background: blue;

}
</style>


