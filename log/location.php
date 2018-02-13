<?php
session_start();
include("connexionDB.php");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Emprunt BDE UTT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


    <!--For Plugins external css-->
    <link rel="stylesheet" href="../assets/css/plugins.css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/nexa-web-font.css" />
    <link rel="stylesheet" href="../assets/css/opensans-web-font.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="../assets/css/responsive.css" />

    <script src="../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script>
        function show(id) {
            var div = document.getElementById(id);
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../index.html#home">Home</a></li>

                    <?php // Boutton connect ou boutton disconnect
                        if(empty($_SESSION['numetu'])){
                    ?>
                        <li class="active padding-top-20"><form method="post" action="connexion.php">
                            <input type="number" name="numetu" placeholder="numero etudiant"/>
                            <input type="password" name="mdp"/>
                            <input type="submit" value="connexion"/>                      
                        </form></li>

                        <li class="active padding-top-20"><input type="button" onClick="show('formNewUser')" title="activate Js for this to work" value="Nouveau compte"/></li>
                    <?php

                        } else {
                            echo "<li class=\"active\"><a href=\"disconnexion.php\">Disconnect</a></li>";
                            $numetu = $_SESSION['numetu'];
                            
                            $stmt = $conn->prepare("SELECT prenom, nom FROM `user` WHERE numetu = $numetu");
                            $stmt->execute(); 

                            $result = $stmt->fetch();
                            $nom = $result[1];
                            $prenom = $result[0]; // stocké dans une variable
                
                        }
                    ?>      
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <section class="portfolio">
		<div class="overlay sections">
            <div class="col-md-6 col-md-offset-3">

				<div class="home-details text-center">
                    <form method="post" action="newUser.php" id="formNewUser" style="display : none;">
                        <table>    
                            <tr>
                                <th>Votre numéro etudiant :  </th> 
                                <th><input type="number" name="numetu" style="color:black;" placeholder="numero etudiant"/></th>
                            <tr>
                            <tr>
                                <th>Votre mot de passe :</th> 
                                <th><input type="password" style="color:black;" name="mdp"/><th>
                            </tr>
                            <tr>
                                <th>Votre nom :</th>
                                <th><input type="text" style="color:black;" name="nom"/></th>
                            </tr>
                            <tr>
                                <th>Votre prenom :</th> 
                                <th><input type="text" style="color:black;" name="prenom"/></th>
                            </tr>
                            <tr>
                                <th>Entrez votre email :</th> 
                                <th><input type="text" style="color:black;" name="email"/></th>
                            </tr>
                        </table>    
                        <input type="submit" style="color:black;" class="margin-top-20" value="creation"/>                  
                    </form>
                </div>

                <?php
                    if(empty($_SESSION['numetu'])){
                    } else {     // si on est connecté
                ?>
        
                <div class="text-center">
                    <h2 style="color:white;">Compte de <?php echo "$prenom"." ".$nom ?></h2>
                </div>
                
                <input type="button" value="emprunter" onClick="show('emprunter')"/>

                <div id="emprunter" style="display:none;">
                    <!-- > A FAIRE : le formulaire pour faire un emprunt</-->
                </div>

                <?php
                    }
                ?>

            </div>
        </div>
    </section>    
</body>