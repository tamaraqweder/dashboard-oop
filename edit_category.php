<?php

require "classes/database.php";
require "category.php";

$database = new Database();
$conn = $database->connect();
$categoryObject = new Catogory($conn);

$id=$_GET["id"];
$category = $categoryObject->getCategoryById($id);

if (isset($_POST["update_category"])) {
    $name = $_POST["name"];
    $categoryObject->updateCategory($id, $name);
    header("Location: categories.php");
exit;
}

?>

<form method="POST">
    <label>Category Name:</label>
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($category['name']); ?>">
    <button type="submit" name="update_category">Update</button>
</form>