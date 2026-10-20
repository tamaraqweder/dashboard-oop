<?php
require "classes/database.php";
require "product.php";

$database = new Database();
$conn = $database->connect();

$productObject = new Product($conn);

if (isset($_POST["delete_product"])) {
    $id = $_POST["id"];

    $productObject->deleteProduct($id);

    header("Location: products.php");
    exit;
}
?>