<?php
session_start();

include("connexionDB.php"); // utilise la variable $conn

    
    if(empty($_POST["numetu"]) || empty($_POST["mdp"])){
       
        echo "<p>Des champs ont étés laissé vides</p>"; // Fonctionne 
        echo "<p>Voulez-vous créer un nouveau compte ?</p>";
        echo "<a href=\"newUser.html\"><input type=\"button\" value=\"Oui\"/></a>";
        echo "<a href=\"connexion.html\"><input type=\"button\" value=\"Non\"/></a>";
        
    } else {

        $numetu = $_POST["numetu"];
        $mdp = $_POST["mdp"];

        $stmt = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE numetu = $numetu");
        $stmt->execute();

        $result = $stmt->fetch();
        $result = $result[0];

        if($result == 0){
            echo "<p>aucun compte n'est crée avec ce numéro étudiant, voulez vous en créer un ?</p>";
            echo "<a href=\"newUser.html\"><input type=\"button\" value=\"Oui\"/></a>";
            echo "<a href=\"connexion.html\"><input type=\"button\" value=\"Non\"/></a>";
        } else {
            $stmt = $conn->prepare("SELECT mdp FROM `user` WHERE numetu = $numetu");
            $stmt->execute();

            $result = $stmt->fetch();
            $result = $result[0];

            if($mdp == $result){

                $_SESSION["numetu"] = $numetu;
                echo "<script type='text/javascript'>document.location.replace('location.php');</script>"; //redirection auto vers le menu principal si JS activé
                echo "vous êtes connectés, retour au <a href=\"location.php\">menu principal</a>";
                
            } else {
                echo "<p>mauvais mot de passe</p>";
                echo "<a href=\"location.html\">Retour à l'accueil</a>";
            }
        }
    }                      

?>