<?php
require_once('CategorieFunction.php');
if (isset($_POST)) {
    $id = $_POST['id'];
    deleteCategorie($id);
    echo 1;
} else {
    echo 0;
}
