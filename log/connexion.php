<?php
session_start();

include("user.php");
    
if(empty($_POST["numetu"]) || empty($_POST["mdp"])){
       
    echo "<p>Des champs ont étés laissé vides</p>";
    echo "<p>Voulez-vous créer un nouveau compte ?</p>";
    echo "<a href=\"newUser.html\"><input type=\"button\" value=\"Oui\"/></a>";
    echo "<a href=\"location.php\"><input type=\"button\" value=\"Non\"/></a>";
        
} else {

    $numetu = $_POST["numetu"];
    $mdpPost = $_POST["mdp"];

    $user = new User($numetu, $conn); // $conn foncionne

    if(empty($user->getNom())){
        
        echo "<p>aucun compte n'est crée avec ce numéro étudiant</p>";
        echo "<a href=\"location.php\">retour à l'accueil</a>";   
        
    } else {

        if($mdpPost == $user->getMdp()){

            $_SESSION["user"] = $user;
            $_SESSION["nom"] = $user->getNom();
            $_SESSION["numetu"] = $user->getNumetu();
            $_SESSION["emprunt"] = $user->getEmprunt();
            $_SESSION["prenom"] = $user->getPrenom();
            echo "<script type='text/javascript'>document.location.replace('location.php');</script>"; //redirection auto vers le menu principal si JS activé
            echo "vous êtes connectés, retour au <a href=\"location.php\">menu principal</a>";
                
        } else {
            echo "<p>mauvais mot de passe</p>";
            echo "<a href=\"location.php\">Retour à l'accueil</a>";
        }
    }
}                      

?>