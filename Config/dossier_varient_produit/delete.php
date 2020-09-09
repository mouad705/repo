<?php
require_once 'VarientProduitFunction.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    deleteSousProduct($id);
    echo 1;
    # code...
} else {
    echo 0;
}
?>
