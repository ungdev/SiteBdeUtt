<?php
include("connexionDB.php");

Class User {

    private $conn;
    private $numetu;
    private $nom;
    private $prenom;
    private $email;
    private $emprunt;
    private $mdp;

    
    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getEmprunt(){
        return $this->emprunt;
    }

    public function getNumetu(){
        return $this->numetu;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMdp(){
        return $this->mdp;
    }


    function __construct($id, $db){
        
        $this->numetu = $id;
        $this->conn = $db;

        // associe les données de l'utilisateur
        $sql = "SELECT * FROM `user` WHERE numetu = $this->numetu";
        
        if($result = $this->conn->query($sql)){
            $row = $result->fetch_assoc();
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom'];
            $this->email = $row['email'];
            $this->mdp = $row['mdp'];

            $this->import();
        } 
        
    }

    public function import(){ 
        // actualise les infos de l'utilisateur 
        
        // importe les différents emprunts de l'utilisateur
        $sql = "SELECT idE from emprunt WHERE idE in (SELECT idE FROM enCours) AND userU = $this->numetu";
        $result = $this->conn->query($sql);
        $i = 0; 
        while($row = $result->fetch_assoc()) {
            $this->emprunt[$i] = $row['idE'];
            $i++;         
        }
        print_r($this->emprunt);
    }
    
    public function rendre($ref){
        $sql = "CALL `retour`('$ref')";
        if(!$result = $this->conn->query($sql)){
            echo "erreur lors de l'appel à la procédure retour";
            return false;
        } else {
            $this->import(); 
            return true;
        }
    }

    public function emprunter($ref){ 
        // renvoie true si l'emprunt a bien été fait, false si l'élément était déjà emprunté
        $sql = "SELECT `emprunt`('$this->numetu', '$ref') AS `emprunt`";
        if(!$result = $this->conn->query($sql)){
            echo "erreur lors de l'appel à la fonction emprunt";
            return false ;
        } else {
            $row = $result->fetch_assoc(); // le résultat se trouve dans $row['emprunt];
            if($row['emprunt']==1){
                $this->import(); 
                return true;
            } else {
                return false;
            }
        }
    }

}

?>