<?php
require_once('UtilisateurFunction.php');
/*************delete user recorder****** */

if (isset($_POST['id'])) {
    $id= $_POST['id'];
    deleteUser($id);
    echo 1;
}
else
{
    echo 0;
}

?>
