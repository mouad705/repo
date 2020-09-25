<?php
require_once('CommandFunction.php');

if(isset($_POST["action"]) && $_POST["action"]=="allcommand")
{
    getAllCommand();
}

if (isset($_POST["id_cmd"])) {
$id_cmd=$_POST["id_cmd"];
    readCommand($id_cmd);
}
    

?>
