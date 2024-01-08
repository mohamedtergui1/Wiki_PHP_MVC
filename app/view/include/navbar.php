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
                        
                        <div  class="collapse navbar-collapse" id="navbarCollapse" >
                               <a href="<?=APP_URL?>signin"class="nav-item nav-link">Sign IN</a>
                                <a href="<?=APP_URL?>signup" class="nav-item nav-link">Sign Up</a>
                         </div>
                    </div>
                   
                    <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                </div>
            </nav>
        </div>
    </div>
