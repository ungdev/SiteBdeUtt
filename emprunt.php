<?php
session_start();

include("connexionDB.php"); // utilisation de $conn


    if(empty($_POST["nomM"])){
       
        echo "vous n'avez pas rempli le champ<br/>";  
        echo "<a href=\"index.php\">retour à l'acceuil<br/></a>";
        
    } else {
        
        $nomM = $_POST["nomM"];
        
        $sql = "SELECT ref FROM `materiel` WHERE nomM = '$nomM' AND ref NOT IN (SELECT refM FROM emprunt WHERE idE IN (SELECT idE FROM enCours)) LIMIT 1";
        $result = $conn->query($sql);    

        $row = $result->fetch_assoc();
        $ref = $row['ref'];
        $numetu = $_SESSION["numetu"];

        $sql = "SELECT `emprunt`($numetu, $ref) AS `emprunt`";
        $result = $conn->query($sql); 

        echo "<script type='text/javascript'>document.location.replace('index.php#logistique');</script>";
        echo "<a href=\"index.php#logistique\">Emprunt effetcué, retour à l'accueil<br/></a><p>pour une 
        reconnexion automatique, activez JavaScript sur votre naviguateur</p>";

    }    

?>