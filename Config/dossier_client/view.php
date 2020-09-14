<?php
require_once('ClientFunction.php');

if (isset($_POST['id'])) {
  $id=$_POST['id'];
  readClient($id);
}
if (isset($_POST['allclient'])) {
  getAllClients();
  // code...
}
//();
?>
