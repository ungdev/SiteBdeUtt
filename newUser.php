<?php
session_start();

include("connexionDB.php"); // utilisation de $conn


    if(empty($_POST["numetu"]) || empty($_POST["mdp"]) || empty($_POST["prenom"]) || empty($_POST["nom"]) || empty($_POST["email"])){
       
        echo "Des champs ont étés laissé vides<br/>"; // Fonctionne  
        echo "<a href=\"connexion.html\">retour à l'acceuil<br/></a>";
        echo "<a href=\"newUser.html\">On retente ?<br/></a>";
        
    } else {
        
        $numetu = $_POST["numetu"];
        $mdp = $_POST["mdp"]; 
        $prenom = $_POST["prenom"]; 
        $nom = $_POST["nom"];     
        $email = $_POST["email"]; 

        $stmt = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE numetu = $numetu");
        $stmt->execute();    

        $result = $stmt->fetch();
        $result = $result[0];

        if($result == 0){

            echo "Nous allons lancer la creation de votre compte";
            $stmt = $conn->prepare("INSERT INTO `user`(`numetu`, `nom`, `prenom`, `email`, `mdp`) VALUES ($numetu,'$nom','$prenom','$email','$mdp')");
            $stmt->execute();

            $_SESSION["numetu"] = $numetu;
            echo "<p>Votre compte a bien été crée ! </p>"; 

        } else {
            echo "Ce numéro étudiant à déjà un compte il vous est impossible d'en créer un deuxième avec la même carte";
            echo "<a href=\"connexion.html\">retour à l'acceuil</a>";
        }

    }    

?>