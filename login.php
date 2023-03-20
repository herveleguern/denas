<?php
require 'client.php';

$loginForm = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$passForm = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
//simulation
$loginForm='toni';
$passForm='123456';
//fin simulation
$erreur = false;
$client = readByLogin($loginForm);
//ce client existe t il dans la BDD ?
if ($client == null) {
    $erreur = true;
} else {
    // le mot de passe saisi est-il égal au mot de passe haché stocké dans la BDD
    echo $client->getLogin(),"\n";
    echo $client->getPass(),"\n";
    if (password_verify($passForm, $client->getPass())) {
        
        echo "Authentification VALIDE\n";
    } else {
        $erreur = true;
    }
}
if ($erreur) {
    echo "Authentification NON VALIDE\n";
}
