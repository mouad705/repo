<?php
require_once('ClientFunction.php');
/***************edite client************************* */

if (isset($_POST)) {
    $ed_id = $_POST['ed_id'];
    $ed_nom = $_POST['ed_nom'];
    $ed_tel = $_POST['ed_tel'];
    $ed_adresse = $_POST['ed_adresse'];
    $ed_ville = $_POST['ed_ville'];
    $ed_paye = $_POST['ed_paye'];
    updateClient($ed_id, $ed_nom, $ed_tel, $ed_adresse, $ed_ville, $ed_paye);
    echo 1;
} else {
    echo 0;
}
