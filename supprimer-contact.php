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
      <h1>Supprimer un contact</h1> 

<?php

$manager = new ContactManager($cnx);
$verif = $manager->ReadContact ($_GET['contactID']);
if(!empty ($verif->getContactID ())) {
    $manager->DeleteContact ($_GET['contactID']);
} else {
    echo "Suppression impossible";
}
?>


</div>
</body>
</html>