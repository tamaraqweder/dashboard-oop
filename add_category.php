<?php

require "classes/database.php";
require "category.php";

$database = new Database();
$conn = $database->connect();
$categoryObject = new Catogory($conn);



if(isset($_POST["add_category"])){
    $name=$_POST["name"];
    $categoryObject->addCategory($name);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>
<body>

    <h1>Add Category</h1>

    <form method="POST">
        <label>Category Name:</label>
        <input type="text" name="name" required>

        <button type="submit" name="add_category">Add</button>
    </form>

</body>
</html>