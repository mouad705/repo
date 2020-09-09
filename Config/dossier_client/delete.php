<?php
require_once('ClientFunction.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    deleteClient($id);
    echo 1;
} else {
    echo 0;
}
