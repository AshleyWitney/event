<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Grand - Event and Conference Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/assets/css/responsive.css">

  </head>
  <body>
<body>
        <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="haut.php" class="navbar-brand"><img src="<?php echo base_url();?>style/assets/img/logo.png" alt=""></a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url();?>index.php/accueil/afficher">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteani">
                  Programmation
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/invite_poste/touteinv">
                 Invité(e)s
                </a>
              </li>
                            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/accueil/lieu_service">
                  Lieux
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/invite_poste/gues">
                  Guest
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/compte/connecter">
                  Connexion
                </a>
              </li>

            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="page-scrool" href="#header-wrap">Home</a>
          </li>
          <li>
            <a class="page-scrool" href="#about">About</a>
          </li>
          <li>
             <a class="page-scroll" href="#schedules">schedules</a>
          </li>
          <li>
            <a class="page-scroll" href="#team">Speakers</a>
          </li>
          <li>
            <a class="page-scroll" href="#gallery">Gallery</a>
          </li>
          <li>
            <a class="page-scroll" href="#faq">Faq</a>
          </li>
          <li>
            <a class="page-scroll" href="#sponsors">Sponsors</a>
          </li>
          <li>
            <a class="page-scroll" href="#pricing">Connexion</a>

          </li>
          <li>
            <a class="page-scroll" href="#google-map-area">Contact</a>
          </li>

        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <!-- Navbar End -->

      <!-- Main Carousel Section Start -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100"  width="20%" height="20%" src="<?php echo base_url();?>style/assets/img/invite/theme2.jpg" alt="First slide">
            <div class="carousel-caption d-md-block" >
              <p class="fadeInUp wow" data-wow-delay=".6s" style="background-color: black;">Les 72h Afro</p>
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Musique et culture africaines</h1>
              <p class="fadeInUp wow" data-wow-delay=".6s">Lieu : Cocody,Abidjan <br> Date: du 07 au 10 Décembre</p>
              <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Obtenez vos tickets !</a>
              <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">En savoir plus</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url();?>style/assets/img/invite/balafon.jpg" alt="Second slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Musique et culture africaines</p>
              <h1 class="wow bounceIn heading" data-wow-delay=".7s">Plusieurs invités!</h1>
              <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">En savoir plus</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url();?>style/assets/img/invite/masq.jpg" alt="Third slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Les 72h afro</p>
              <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Prenez vos places!</h1>
              <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Main Carousel Section End -->

    </header>

 <hr />
