<?php
require_once('./CommandFunction.php');
if (isset($_POST)) {
$id=$_POST["af_id_cmd"];
$nom=$_POST["af_nom_cmd"];
$id_client=$_POST["af_id_client"];
$total=$_POST["af_total_cmd"];

    affectCommand($id,$id_client,$nom,$total);
    echo 1;
}
else
{
    echo 0;  
}
?>