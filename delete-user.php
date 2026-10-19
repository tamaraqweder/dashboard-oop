<?php
require "classes/database.php";
require "classes/user.php";

$database = new Database();
$conn = $database->connect();

$userObject = new User($conn);

if (isset($_POST["confirm_delete"])) {
    $id = $_POST["id"];

    $userObject->deleteUser($id);

    header("Location: users.php");
    exit;
}
?>