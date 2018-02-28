<?php
session_start();

include("connexionDB.php");
    
if(empty($_POST["numetu"]) || empty($_POST["mdp"])){
       
    echo "<p>Des champs ont étés laissé vides</p>";
    echo "<a href=\"index.php\"><input type=\"button\" value=\"retour\"/></a>";
        
} else {

    $numetu = $_POST["numetu"];
    $mdpPost = $_POST["mdp"];

    $sql = "SELECT mdp FROM user WHERE numetu = $numetu";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $mdp = $row['mdp'];  
    
    if(empty($mdp)){
        
        echo "<p>aucun compte n'est crée avec ce numéro étudiant</p>";
        echo "<a href=\"index.php\">retour à l'accueil</a>";   
        
    } else {

        if($mdpPost == $mdp){

            $_SESSION["numetu"] = $numetu;
            
            echo "<script type='text/javascript'>document.location.replace('index.php');</script>"; //redirection auto vers le menu principal si JS activé
            echo "vous êtes connectés, retour au <a href=\"index.php\">menu principal</a>";
                
        } else {
            echo "<p>mauvais mot de passe</p>";
            echo "<a href=\"index.php\">Retour à l'accueil</a>";
        }
    }
}                      

?>