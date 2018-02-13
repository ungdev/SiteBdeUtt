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

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


    <!--For Plugins external css-->
    <link rel="stylesheet" href="assets/css/plugins.css" />
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/nexa-web-font.css" />
    <link rel="stylesheet" href="assets/css/opensans-web-font.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
    <section>
        
        <?php // Boutton connect ou boutton disconnect
            if(empty($_SESSION['numetu'])){
        ?>
            <form method="post" action="connexion.php">
                <input type="number" name="numetu" placeholder="numero etudiant"/>
                <input type="password" name="mdp"/>
                <input type="submit" value="connexion"/>                       
            </form>

            <p>Voulez vous <a href="newUser.html">creer un nouveau compte</a> ?</p>
        <?php

            } else {
                echo "<a href=\"disconnexion.php\"><input type='button' value='Disconnect'/></a>";
                $numetu = $_SESSION['numetu'];
                
                /*$stmt = $conn->prepare("SELECT prenom, nom FROM `user` WHERE numetu = $numetu");
                $stmt->execute(); 

                $result = $stmt->fetch();
                $nom = $result[1];
                $prenom = $result[0];
                echo "<p>bienvenue sur votre espace perso ".$prenom." ".$nom."</p>";*/
     
            }
        ?>

    </section>
</body>