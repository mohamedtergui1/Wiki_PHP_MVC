<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   
    <link href="<?=APP_URL?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=APP_URL?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  
    <link href="<?=APP_URL?>public/asset/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="<?=APP_URL?>public/asset/css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    <?php 
        include  '../app/view/include/navbar.php';
       ?>
    <!-- Navbar End -->



  <?=$body?>



  <!-- Footer Start -->
      <?php 
        include  '../app/view/include/footer.php';
       ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=APP_URL?>public/asset/lib/wow/wow.min.js"></script>
    <script src="<?=APP_URL?>public/asset/lib/easing/easing.min.js"></script>
    <script src="<?=APP_URL?>public/asset/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=APP_URL?>public/asset/lib/counterup/counterup.min.js"></script>
    <script src="<?=APP_URL?>public/asset/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=APP_URL?>public/asset/js/main.js"></script>
</body>

</html>