<?php
require_once('VarientProduitFunction.php');

//search client par nom ou telephone
if(isset($_GET['q']))
{
$motclef=$_GET['q'];
searchClient($motclef);
}

//************************************************* */

if (isset($_POST['id'])) {

    $id=$_POST['id'];
readSousProduct($id);
    # code...
}

if (isset($_GET['str']))
{
    $id=$_GET['str'];
    SearchSousProduct($id);
}
?>