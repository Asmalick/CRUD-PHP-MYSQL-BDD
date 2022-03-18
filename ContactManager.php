<?php
class ContactManager {
    private $cnx;


    public function __construct ($cnx) {
        $this -> setCnx($cnx);
    }

    public function CreateContact (Contact $contact) {
        // Inserer un nouveau contact
        if( (empty($contact->getPrenom()))  || (empty($contact->getNom()))  || (empty($contact->getEmail()))){
            echo 'Le prénom, le nom ou l\'email doit etre rempli';
        } else { 
            $sql = 'INSERT INTO contact ( prenom, nom, email) VALUES ( :prenom, :nom, :email)';

            $req = $this->cnx->prepare($sql);
    
            $req->bindValue (':prenom', $contact->getPrenom (), PDO::PARAM_STR);
            $req->bindValue (':nom', $contact->getNom (), PDO::PARAM_STR);
            $req->bindValue (':email', $contact->getEmail (), PDO::PARAM_STR);
    
           $verif = $req->execute();
           
           if($verif) {
               echo 'Contact inséré.';
           } else {
               echo 'Une erreur est servenue';
           }
     }
        
    }

    public function ReadContact ($id) {
        //Afficher  le contact demandé
        $sql = 'SELECT * FROM contact WHERE contactID = :contactID';

        $req = $this->cnx->prepare($sql);

        $req->bindValue (':contactID', $id, PDO::PARAM_STR);

        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        $contact = new Contact ();
        $contact->setContactID ($donnees ['contactID']);
        $contact->setPrenom ($donnees ['prenom']);
        $contact->setNom ($donnees ['nom']);
        $contact->setEmail ($donnees ['email']);

        /*foreach($donnees as $cle =>$valeur) {
            $methode = 'set' .ucfirst($cle);
            $contact->$methode($valeur);
        } */
    

        return $contact;


    }

    public function Compter () {
        // retourne le nombre de contact
        $sql = 'SELECT COUNT (*) AS compte FROM contact';

        $req = $this->cnx->prepare($sql);

        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        return $donnees ['compte'];

    }

    public function ReadAllContact () {
        //Afficher tous les contacts
        $sql = 'SELECT * FROM contact';

        $req = $this->cnx->prepare($sql);

        $req->execute();

        while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $contact = new Contact ();
            $contact->setContactID ($donnees['contactID']);
            $contact->setPrenom ($donnees['prenom']);
            $contact->setNom ($donnees['nom']);
            $contact->setEmail ($donnees['email']);
            $contacts[] = $contact;
        }
        if (!empty ($contacts)) {
            
            return $contacts;

        }

    }

    
    public function UpdateContact (Contact $contact) {
        //Modifie le contact
        $sql = 'UPDATE contact SET prenom = :prenom, nom = :nom, email = :email WHERE contactID = :contactID';;
        
        $req = $this->cnx->prepare($sql);

        $req->bindValue (':contactID', $contact->getContactID(), PDO::PARAM_INT);
        $req->bindValue (':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue (':nom', $contact->getNom(), PDO::PARAM_STR);
        $req->bindValue (':email', $contact->getEmail(), PDO::PARAM_STR);
        
        $verif = $req->execute();

        if($verif) {
            echo 'Modification effectuée.';
        } else {
            echo 'Une erreur est survenue';
        }

    }


    public function DeleteContact ($id) {
        //Supprimer le contact
        $sql =' DELETE FROM contact WHERE contactID = :contactID';

        $req = $this->cnx->prepare($sql);

        $req->bindValue (':contactID', $id, PDO::PARAM_INT);

       $verif =  $req->execute();
       if($verif) {
        echo 'Suppression effectuée.';
    } else {
        echo 'Une erreur est survenue';
    }

    }


    private function setCnx (PDO $cnx) {
        $this->cnx = $cnx;
    }

}