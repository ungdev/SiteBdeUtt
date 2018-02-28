<?php
session_start();

include("connexionDB.php"); // utilisation de $conn


    if(empty($_POST["numetu"]) || empty($_POST["mdp"]) || empty($_POST["prenom"]) || empty($_POST["nom"]) || empty($_POST["email"])){
       
        echo "Des champs ont étés laissé vides<br/>";  
        echo "<a href=\"index.php\">retour à l'acceuil<br/></a>";
        
    } else {
        
        $numetu = $_POST["numetu"];
        $mdp = $_POST["mdp"]; 
        $prenom = $_POST["prenom"]; 
        $nom = $_POST["nom"];     
        $email = $_POST["email"]; 

        $sql = "SELECT COUNT(*) FROM `user` WHERE numetu = $numetu";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $num = $row['COUNT(*)'];

        if($num == 0){

            echo "Nous allons lancer la creation de votre compte";
            
            $sql = "INSERT INTO `user`(`numetu`, `nom`, `prenom`, `email`, `mdp`) VALUES ($numetu,'$nom','$prenom','$email','$mdp')";
            
            if($resultat = $conn->query($sql)){
              
                $_SESSION["numetu"] = $numetu;
                echo "<p>Votre compte a bien été crée ! </p>"; 
                echo "<script type='text/javascript'>document.location.replace('index.php');</script>"; //redirection vers le menu principal
                echo "<p>Si la redirection automatique n'a pas fonctionnée, veuillez cliquez sur le lien ci dessous pour revenir à l'acceuil</p>";
                echo "<p><a href=\"index.php\">Acceuil</a></p>";
            
            } else {
            
                echo "erreur compte non créé<br/>";
                echo "<a href='index.php'><p>accueil</p></a>";
            
            }

        } else {
          
            echo "Ce numéro étudiant à déjà un compte il vous est impossible d'en créer un deuxième avec la même carte";
            echo "<p><a href=\"index.php\">retour à l'acceuil</a></p>";
        
        }

    }    

?>