<?php
require_once('CategorieFunction.php');
if (isset($_POST)) {
    $ed_id = $_POST['ed_id'];
    $ed_nom = $_POST['ed_nom'];
    $ed_description = $_POST['ed_description'];
    updateCategorie($ed_id, $ed_nom, $ed_description);
    echo 1;
} else {
    echo 0;
}
