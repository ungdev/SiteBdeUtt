<?php
session_start();

include("connexionDB.php"); // utilisation de $conn


    if(empty($_POST["nomM"])){
       
        echo "vous n'avez pas rempli le champ<br/>"; // Fonctionne  
        echo "<a href=\"location.php\">retour à l'acceuil<br/></a>";
        
    } else {
        
        $nomM = $_POST["nomM"];
        
        $sql = "SELECT ref FROM `materiel` WHERE nomM = 'tente' AND ref NOT IN (SELECT refM FROM emprunt WHERE idE IN (SELECT idE FROM enCours)) LIMIT 1";
        $result = $conn->query($sql);    

        $row = $result->fetch_assoc();
        $ref = $row['ref'];
        $numetu = $_SESSION["numetu"];

        echo $ref.$numetu;

    }    

?>