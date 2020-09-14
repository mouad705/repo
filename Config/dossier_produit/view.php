<?php
require_once('ProduitFunction.php');
if (isset($_POST["action"]) && $_POST["action"]=="allproduct") {
    getallProduct();
}
if (isset($_POST["id_pp"])) 
{
    $id=$_POST["id_pp"];
    readProduct($id);
}
?>
