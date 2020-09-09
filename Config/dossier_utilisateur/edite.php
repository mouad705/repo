<?php
require_once('UtilisateurFunction.php');
require_once('connexion.php');
/******edite user********************** */


$id = $_POST['ed_id'];
$nom = $_POST['ed_nom'];
$pseudo = $_POST['ed_pesudo'];
$pass = $_POST['ed_pass'];
$description = $_POST['ed_description'];
$etat = 'inactive';
if (empty($_FILES['ed_imges']['name'])) {
    $images = $_POST['ed_imges'];
    updateUser($id, $nom, $pseudo, $pass, $description, $images, $etat);
} else {
    $images = $_FILES['ed_imges']['name'];
}
$uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['ed_imges']['name']);
if (move_uploaded_file($_FILES['ed_imges']['tmp_name'], $uploadfile)) {
    updateUser($id, $nom, $pseudo, $pass, $description, 'uploads/' . $images, $etat);
    echo 1;
} else {
    echo 0;
}
