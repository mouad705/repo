<?php
require_once('CategorieFunction.php');
if (isset($_POST)) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    createCategorie($nom, $description);
    echo 1;
} else {
    echo 0;
}
