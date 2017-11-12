<?php
include "../../Controller/Control.php";

$id = $_GET["id"];
$con = new  Control();
$con->cidades($id);
