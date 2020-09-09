<?php
require_once('ProduitFunction.php');
require_once('../../connexion.php');
if (isset($_POST)) {
    $id=time();
    $designation=$_POST['designation'];
    $Command=$_POST['Command'];
    $unite=$_POST['unite'];
    $quantite=$_POST['quantit'];
    $color=$_POST['color'];
    $date=$_POST['date'];
    $images=$_FILES['imges']['name'];
    $etat=$_POST['etat'];
    $stocklimit=$_POST['stocklimit'];
    $uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['imges']['name']);
if (move_uploaded_file($_FILES['imges']['tmp_name'], $uploadfile)) {
    createProduct($id,$designation,$Command,$unite,$quantite,$color,$date, 'uploads/' . $images, $etat,$stocklimit);
    echo 1;
} else {
    echo 0;
}
    # code...
}
?>
