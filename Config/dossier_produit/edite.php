<?php
require_once('ProduitFunction.php');

if(isset($_POST["action"]) && $_POST["action"]=="edit")

{


    $id=$_POST['ed_id'];
    $designation=$_POST['ed_designation'];
    $categorie=$_POST['ed_categorie'];
    $unite=$_POST['ed_unite'];
    $quantite=$_POST['ed_quantit'];
    $color=$_POST['ed_color'];
    $date=$_POST['ed_date'];
    $etat=$_POST['ed_etat'];
    $stocklimit=$_POST['ed_stocklimit'];
    $uploaddir = '../../uploads/';
    
    if(empty($_FILES['ed_imges']['name']))
    {
        $images=$_POST['ed_imges'];
        updateProduct($id,$designation,$categorie,$unite,$quantite,$color,$date,$images, $etat,$stocklimit);
    }
    else
    {
        $images=$_FILES['ed_imges']['name'];
    }

$uploadfile = $uploaddir . basename($_FILES['ed_imges']['name']);
if (move_uploaded_file($_FILES['ed_imges']['tmp_name'], $uploadfile)) {
    updateProduct($id,$designation,$categorie,$unite,$quantite,$color,$date, 'uploads/' . $images, $etat,$stocklimit);
    echo 1;
} else {
    echo 0;
}

}
    if (isset($_POST["total_sp"]) && isset($_POST["id_pp"])) {

        $total_sp=$_POST["total_sp"];
        $id_pp=$_POST["id_pp"];
        UPDATE_QUANTITE_PRODUIT($total_sp,$id_pp);
        echo 1;
    }
    else {
        echo 0;
    }

?>
