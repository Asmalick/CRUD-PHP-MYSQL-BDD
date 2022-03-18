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
      <p><a href="index.php">Retour à l'accueil</a></p>
      <h1>Modifier  un contact</h1> 
<?php
$contact = new Contact();
$contact->setContactID($_POST['contactID']);
$contact->setPrenom($_POST['prenom']);
$contact->setNom($_POST['nom']);
$contact->setEmail($_POST['email']);

$manager = new ContactManager($cnx);
$manager->UpdateContact($contact);
?>


</div>
</body>
</html>