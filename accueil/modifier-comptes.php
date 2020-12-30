<?php 
    session_start();
    if(!isset($_SESSION['idEmploye'])){
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Fratis Banque</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Chrome */
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            margin:0;
        }

        input::-o-inner-spin-button,
        input::-o-outer-spin-button { 
            -o-appearance: none;
            margin:0
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Compte épargne
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="accueil.php">
                                        <i class="far fa-check-square"></i>Ouvrir un compte</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-comptes.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="modifier-comptes.php">
                                        <i class="far fa-edit"></i>Modifier un compte</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="fermer-epargne.php">
                                        <i class="far fa-minus-square"></i>Fermer un compte</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-briefcase"></i>Assurance
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="assurance.php">
                                        <i class="far fa-check-square"></i>Ouvrir une assurance</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-assurance.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-dollar"></i>Prêts
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="demande-pret.php">
                                        <i class="far fa-check-square"></i>Faire une demande</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-pret.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="fermer-pret.php">
                                        <i class="far fa-minus-square"></i>Clôturer un prêt</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub" id="Admin">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-link"></i>Administrateur
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="alimenter-comptes.php">
                                        <i class="far fa-plus-square"></i>Alimenter les comptes</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="suivi.php">
                                        <i class="far fa-file"></i>Suivi employé</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="banque.php">
                                        <i class="fas fa-dollar"></i>Compte en banque</a>
                                </li>
                            </ul>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="employe.php">
                                        <i class="far fa-edit"></i>Gestion Employés</a>
                                </li>
                            </ul>


                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub active">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Compte épargne
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="accueil.php">
                                        <i class="far fa-check-square"></i>Ouvrir un compte</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-comptes.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="active">
                                    <a href="modifier-comptes.php">
                                        <i class="far fa-edit"></i>Modifier un compte</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="fermer-epargne.php">
                                        <i class="far fa-minus-square"></i>Fermer un compte</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-briefcase"></i>Assurance
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="assurance.php">
                                        <i class="far fa-check-square"></i>Ouvrir une assurance</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-assurance.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-dollar"></i>Prêts
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="demande-pret.php">
                                        <i class="far fa-check-square"></i>Faire une demande</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="consulter-pret.php">
                                        <i class="far fa-caret-square-o-down"></i>Consulter</a>
                                </li>
                            </ul> 
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="fermer-pret.php">
                                        <i class="far fa-minus-square"></i>Clôturer un prêt</a>
                                </li>
                            </ul>

                        </li>

                        <li class="has-sub" id="Admin2">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-link"></i>Administrateur
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="alimenter-comptes.php">
                                        <i class="far fa-plus-square"></i>Alimenter les comptes</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="suivi.php">
                                        <i class="far fa-file"></i>Suivi employé</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="banque.php">
                                        <i class="fas fa-dollar"></i>Compte en banque</a>
                                </li>
                            </ul>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li class="">
                                    <a href="employe.php">
                                        <i class="far fa-edit"></i>Gestion Employés</a>
                                </li>
                            </ul>


                        </li>


                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar1.jpg" alt="" />
                                        </div>
                                        <div class="content">
                                            <?php 
                                                if (isset($_SESSION['nom'])) {
                                            ?>
                                                <a class="js-acc-btn" href="#"><?php echo($_SESSION['nom']) ?></a>
                                            <?php
                                                }else{
                                            ?>
                                                <a class="js-acc-btn" href="#"> Employé Fratis</a>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <?php 
                                                            if (isset($_SESSION['nom'])) {
                                                        ?>
                                                            <a class="js-acc-btn" href="#"><?php echo($_SESSION['nom']) ?></a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <a class="js-acc-btn" href="#"> Employé Fratis</a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </h5>
                                                    <?php 
                                                        if (isset($_SESSION['email'])) {
                                                    ?>
                                                        <span class="email"><?php echo($_SESSION['email']) ?></span>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <span class="email">employe@discrod.gg</span>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../controller/deconnexion.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Modifier un compte </div>
                                    <div class="card-body card-block">
                                        <form method="GET" action="modifier-comptes_details.php">
                                            <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Inserez le numéro de compte à modifier</label>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-list-ol"></i>
                                                            </div>
                                                            <input type="number" id="idCompte" name="idCompte" placeholder="Numero de compte" class="form-control" min=1 required="required">
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-check"></i> Modifier
                                                        </button>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 iMelo#8285. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        $("#Epargne").on('change',function(){
            var Epargne = $('#Epargne').val();

            if(Epargne == 'fraise'){
                $('#dateFin').hide();
            }else{
                $('#dateFin').show();
            }
        });
        
    </script>

        <?php if($_SESSION['grade'] != 'Administrateur'){
    ?>
        <script type="text/javascript">
        $( document ).ready(function() {
          $("#Admin2").hide();
        });

    </script>
    <?php
    }
    ?>
</body>

</html>
<!-- end document-->
