<?php
require "classes/database.php";
require "product.php";

$database = new Database();
$conn = $database->connect();

$productObject = new Product($conn);


$id = $_GET["id"];
$product = $productObject->getProductById($id);
$categories = $productObject->getCategories();

if (isset($_POST["update_product"])) {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $category_id = $_POST["category_id"];






   $image = $product["image"];

if (!empty($_FILES["image"]["name"])) {
    $image = "uploads/products/" . basename($_FILES["image"]["name"]);

    move_uploaded_file(
        $_FILES["image"]["tmp_name"],
        $image
    );
}





    $productObject->updateProduct(
        $id,
        $name,
        $price,
        $description,
        $quantity,
        $category_id,
          $image
    );

    header("Location: products.php");
    exit;
}

?>



<h2>Edit Product</h2>

<h2>Edit Product</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Product Name:</label>
    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($product["name"]) ?>"
        required
    >
    <br><br>

    <label>Price:</label>
    <input
        type="number"
        name="price"
        step="0.01"
        value="<?= htmlspecialchars($product["price"]) ?>"
        required
    >
    <br><br>

    <label>Description:</label>
    <textarea name="description" required><?= htmlspecialchars($product["description"]) ?></textarea>
    <br><br>

    <label>Quantity:</label>
    <input
        type="number"
        name="quantity"
        min="0"
        value="<?= htmlspecialchars($product["quantity"]) ?>"
        required
    >
    <br><br>

    <label>Category:</label>
    <select name="category_id" required>
        <option value="">Choose Category</option>

        <?php foreach ($categories as $category) { ?>
            <option
                value="<?= $category["id"] ?>"
                <?= $product["category_id"] == $category["id"] ? "selected" : "" ?>
            >
                <?= htmlspecialchars($category["name"]) ?>
            </option>
        <?php } ?>

    </select>
    <br><br>

    <label>Change Image:</label>
<input type="file" name="image" accept="image/*">
<br><br>
    <br><br>

    <button type="submit" name="update_product">Update Product</button>

</form>