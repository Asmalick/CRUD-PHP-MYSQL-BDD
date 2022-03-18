<?php
include('include/cnx.php');
include('include/autoloader.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/style.css" />
</head>

<body>

<div class ="contact">
    <h2>Accueil</h2>
    <p><a href="creer-contact.php">Créer un contact</a></p>
    <h2>Liste des contacts</h2>

    <?php
    $manager = new ContactManager($cnx);
    $lescontacts = $manager->ReadAllContact();
    if(empty($lescontacts)) {
        echo 'Il n\'y a actuellement aucun contact';
    } else {
        echo 'Il ya '.$manager->Compter().' contacts';
        foreach ($lescontacts as $lecontact) {
            echo '<p>' .$lecontact->getPrenom().' ' .$lecontact->getNom().' '.$lecontact->getEmail(). ' [ <a href="modifier-contact.php?contactID='.$lecontact->getContactID() .' 
            "> Modifier </a>]| [<a href="supprimer-contact.php?contactID=' .$lecontact->getContactID().' "> Supprimer </a> ] </p>';
    
        }
    
}


    ?>

</div>
    
</body>
</html>