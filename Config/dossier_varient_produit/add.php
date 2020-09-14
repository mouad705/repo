<?php
require_once('VarientProduitFunction.php');

if (isset($_POST)) {
    $id=$_POST['sp_id'];
    $id_pp=$_POST['sp_id_pp'];
    $designation=$_POST['sp_designation'];
    $unit=$_POST['sp_unite'];
    $rapport=$_POST['sp_rapport'];
    $prix_vent=$_POST['sp_prix_vent'];
    $description=$_POST['sp_description'];
    $images=$_FILES['sp_imges']['name'];
    $uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['sp_imges']['name']);
if (move_uploaded_file($_FILES['sp_imges']['tmp_name'], $uploadfile)) {
    createSousProduct($id,$id_pp,$designation,$unit,$rapport,$prix_vent,$description,'uploads/' . $images);
    echo 1;
} else {
    echo 0;
}
    # code...
}
?>