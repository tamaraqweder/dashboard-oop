<?php

require "classes/database.php";
require "category.php";

$database = new Database();
$conn = $database->connect();
$categoryObject = new Catogory($conn);

$id = $_POST["id"];
$categoryObject->deleteCategory($id);
header("Location: categories.php");
exit;

?>