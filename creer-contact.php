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
        <p><a href="index.php">Retour à l'accueil<a></p>
        <h1>Créer un contact</h1>
        <form method="post" action="creer-contact-traitement.php">
            <input type="text" name="prenom" placeholder="Prénom" />
            <input type="text" name="nom" placeholder="Nom" />
            <input type="text" name="email" placeholder="Email" />
            <input type="submit" value="Créer un contact" />

        </form>


    </div>
</body>
</html>