<?php

function dbProcess($request) {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $response = $bdd->exec($request);
    return $response;    
}

function dbSelect($qry) {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $response = $bdd->query($qry);
    return $response;
}
?>
