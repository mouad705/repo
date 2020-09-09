<?php
require_once('ProduitFunction.php');
if (isset($_POST)) {
    $id = $_POST['id'];
    deleteProduct($id);
    echo 1;
} else {
    echo 0;
}
?>