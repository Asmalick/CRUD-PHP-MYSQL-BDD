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
    <div class="contact">
<?php
  $manager =  new ContactManager ($cnx);
  $contact = $manager->ReadContact($_GET['contactID']);

?>
        <p><a href="index.php">Retour à l'accueil<a></p>
        <h1>Modifier un contact</h1>
        <form method="post" action="modifier-contact-traitement.php">
            <input type="text" name="prenom" value=" <?= $contact->getPrenom();?>" />
            <input type="text" name="nom" value="<?= $contact->getNom();?>" />
            <input type="text" name="email" value="<?= $contact->getEmail();?>" />
            <input type="hidden"name="contactID" value="<?=$_GET['contactID']; ?> " />

<?php
if( (empty($contact->getPrenom())) || (empty($contact->getNom())) || (empty($contact->getEmail())) )
  {
echo '<strong>Modification impossible < /strong>';
} else {
?>
    <input type="submit" value="Modifier" />;
<?php
}

?>
      

        </form>


    </div>
</body>
</html>