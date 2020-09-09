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
echo 1;

}
else
{
    echo 0;
}
?>
