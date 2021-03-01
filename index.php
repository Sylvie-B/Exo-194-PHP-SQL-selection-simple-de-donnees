<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



</body>
</html>

<?php

/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */

try {
    $server = 'localhost';
    $db = 'exo-194';
    $user = 'root';
    $pass = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);

    $stmt = $bdd->prepare("SELECT nom, prenom, rue, numero, code_postal, ville, pays, mail");

    $state = $stmt->execute();

    if($state){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    else {
        echo "erreur";
    }
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}

?>


