<?php
class Contact {
    private $contactID;
    private $prenom;
    private $nom;
    private $email;

    public function getContactID() {
        return $this->contactID;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setContactID ($contactID) {
        if ($contactID >0) {  
             $this->contactID = $contactID ;
            }

    }

    public function setPrenom ($prenom) {
        if (is_string ($prenom)) {  
             $this->prenom = $prenom ;
            }

    }

    public function setNom ($nom) {
        if (is_string ($nom)) {  
             $this->nom = $nom ;
            }

    }
    
    public function setEmail ($email) {
        if (is_string ($email)) {  
             $this->email = $email ;
            }

    }



}