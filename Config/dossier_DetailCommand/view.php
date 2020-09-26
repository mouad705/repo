<?php
require_once('./DetailCommandFunction.php');
if (isset($_POST["id_cmd"])) {
    $id_cmd=$_POST["id_cmd"];
    readdetailcommand($id_cmd);
}
