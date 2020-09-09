<?php
require_once('./DetailCommandFunction.php');
if (isset($_POST))
{
  $id_cmd=$_POST['id_cmd'];
  $id_produit=$_POST['id_produit'];
  $nom_produit=$_POST['nom_produit'];
  $prix=$_POST['prix'];
  $quantite=$_POST['quantite'];
  $total=$_POST['total'];
  createdetailcommand($id_cmd,$id_produit,$nom_produit,$prix,$quantite,$total);
  echo 1;


}
else {
  echo 0;
}

 ?>
