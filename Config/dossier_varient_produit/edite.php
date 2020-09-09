<?php
require_once('VarientProduitFunction.php');

if (isset($_POST)) {
    $id=$_POST['ed_sp_id'];
    $designation=$_POST['ed_sp_designation'];
    $unit=$_POST['ed_sp_unite'];
    $rapport=$_POST['ed_sp_rapport'];
    $quantit=$_POST['ed_sp_quantite'];
    $prix_vent=$_POST['ed_sp_prix_vent'];
    $description=$_POST['ed_sp_description'];
    $images=$_FILES['ed_sp_imge']['name'];
    if (empty($images)) {
        $images=$_POST['ed_sp_view_imge'];
        updateSousProduct($id,$designation,$unit,$rapport,$quantit,$prix_vent,$description,$images);
    }
    $uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['ed_sp_imge']['name']);
if (move_uploaded_file($_FILES['ed_sp_imge']['tmp_name'], $uploadfile)) {
    updateSousProduct($id,$designation,$unit,$rapport,$quantit,$prix_vent,$description, 'uploads/' . $images);
    echo 1;
} else {
    echo 0;
}
    # code...
}
?>