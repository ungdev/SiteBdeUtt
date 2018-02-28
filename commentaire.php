<?php
session_start();

include("connexionDB.php"); // utilisation de $conn


    if(empty($_POST["commentaire"])){
       
        echo "Des champs ont étés laissé vides<br/>";  
        echo "<a href=\"index.php\">retour à l'acceuil<br/></a>";
        
    } else {
        
        $commentaire = $_POST["commentaire"];
        $type = $_POST["type"]; 
        $numetu = $_POST["user"];
        $sql = "INSERT INTO `commentaire`(`type`, `commentaire`, `user`,`date`) VALUES ('$type','$commentaire',$numetu, NOW())";
        if($result = $conn->query($sql)){
            
            echo "<script type='text/javascript'>document.location.replace('index.php');</script>"; //redirection auto vers le menu principal si JS activé
            echo "commentaire envoyé, retour au <a href=\"index.php\">menu principal</a>";
                
        } else {
            echo "<p>erreur</p>";
            echo $sql;
            echo "<a href=\"index.php\">Retour à l'accueil</a>";
        }
    }    

?>