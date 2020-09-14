<?php
require_once('./CommandFunction.php');
if (isset($_POST)) {
$id_client=$_POST['id_client'];
$nom=$_POST['nom_cmd'];
$tv=0;
$remis=0;
$etat="";
$prix_total=0;
createCommand($id_client,$nom,$tv,$remis,$etat,$prix_total);

}
else
{
    echo 0;
}

if (isset($_POST['id']) && isset($_POST['quantite'])) {

  $id=$_POST['id'];
  $quantite=$_POST['quantite'];

  TestQuantiteProduite($id,$quantite);
  // code...
}


/// for client octicon-diff-added

?>
