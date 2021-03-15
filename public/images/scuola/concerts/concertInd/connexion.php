<?php

//pour se connecter à notre base de donnée et voir si la base de données fonctionne bien. 
// Si aucun message d'erreur ne s'affiche c'est que le code est bon
try{
    $bdd=new PDO('mysql:host=db5001409438.hosting-data.io;dbname=dbs1190281;charset=utf8','dbu75403','9h5mkanIi@77');
}
catch (Exception $e) {
    die($e->getMessage());
}

?>