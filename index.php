<?php
    $server = 'localhost';
    $db = 'exo-194';
    $user = 'root';
    $pass = '';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="info">
        <h2>Informations utilisateurs :</h2>
    </div>
    <?php
    try {
        $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $bdd->prepare("SELECT nom, prenom, rue, numero, code_postal, ville, pays, mail FROM user");

        $state = $stmt->execute();

        if($state){
            foreach ($stmt->fetchAll() as $user) {
                echo "<div class='info'>";
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
                echo "<div>".$user['numero'].", ".$user['rue']." ".$user['code_postal']." ".$user['ville']." ".$user['pays']."</div>";
                echo "<div>".$user['mail']."</div>";
                echo "</div>";
            }
        }
        else {
            echo "erreur";
        }
    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }
?>
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

?>
