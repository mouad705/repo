<?php
require_once('UtilisateurFunction.php');
require_once('connexion.php');


$nom = $_POST['nom'];
$pseudo = $_POST['pesudo'];
$pass = $_POST['pass'];
$description = $_POST['description'];
$images = $_FILES['imges']['name'];
$etat = 'inactive';
$uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['imges']['name']);
if (move_uploaded_file($_FILES['imges']['tmp_name'], $uploadfile)) {
    createUser($nom, $pseudo, $pass, $description, 'uploads/' . $images, $etat);
    echo 1;
} else {
    echo 0;
}
