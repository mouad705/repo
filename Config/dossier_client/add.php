<?php
require_once('ClientFunction.php');

if (isset($_POST)) {
  $nom = $_POST['nom'];
  $tel = $_POST['tel'];
  $adresse = $_POST['adresse'];
  $ville = $_POST['ville'];
  $paye = $_POST['paye'];

createClient($nom, $tel, $adresse, $ville, $paye);
echo 1;



}
else {
  echo 0;
}


if (isset($_POST['action']) && $_POST['action']=="add1") {
  if (isset($_POST['nom_client'])&& isset($_POST['tel_client'])) {
    $nom_client = $_POST['nom_client'];
    $tel_client = $_POST['tel_client'];
    $adresse_client = "";
    $ville_client = "";
    $paye_client = "";
       createClient($nom_client, $tel_client, $adresse_client, $ville_client, $paye_client);

          echo 1;
          } else {
           echo 0;
  }

  // code...
}
?>
