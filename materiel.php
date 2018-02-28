<?php
include("connexionDB.php");

Class Materiel {

    private $conn;
    private $nom;
    private $categorie;
    private $ref;
    private $emprunt;

    
    public function getNom(){
        return $this->nom;
    }

    public function getCategorie(){
        return $this->categorie;
    }

    public function getEmprunt(){
        return $this->emprunt;
    }

    public function getRef(){
        return $this->ref;
    }


    function __construct($id, $db){
        
        $this->numetu = $id;
        $this->conn = $db;

        // associe les données de l'utilisateur
        $sql = "SELECT * FROM `materiel` WHERE ref = $this->ref";
        $result = $this->conn->query($sql); 

        $row = $result->fetch_assoc();
        $this->nom = $row['nomM'];
        $this->categorie = $row['categorie'];

    }

    public function dispo(){
        
        $this->import();
        if(empty($this->emprunt)){
            return true;
        } else {
            return false;
        }

    }

}

$materiel = new Materiel(4,$conn);
echo $materiel->getCategorie();
echo $materiel->getNom();

?>