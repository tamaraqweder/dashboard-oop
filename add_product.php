<?php
require "classes/database.php";
require "product.php";

$database = new Database();
$conn = $database->connect();

$productObject = new Product($conn);
$categories = $productObject->getCategories();
if(isset($_POST["add_product"])){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $category_id = $_POST["category_id"];
    





     $image = $_FILES["image"];

      $tmp_name = $image["tmp_name"];

        $imageName = time() . "_" . basename($image["name"]);

      $uploadPath = "uploads/products/" . $imageName;

     move_uploaded_file($tmp_name, $uploadPath);





    $product=$productObject->addProduct
    ($name,
     $price, 
     $description, 
     $quantity,
      $category_id,
      $uploadPath
      );


        header("Location: products.php");
    exit;

}

?>




<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">
    <label>Product Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required>
    <br><br>

    <label>Description:</label>
    <textarea name="description" required></textarea>
    <br><br>

    <label>Quantity:</label>
    <input type="number" name="quantity" min="0" required>
    <br><br>

    <label>Category:</label>
    <select name="category_id" required>
        <option value="">Choose Category</option>


          <?php foreach ($categories as $category) { ?>
            <option value="<?= $category["id"] ?>">
                <?= htmlspecialchars($category["name"]) ?>
            </option>
        <?php } ?>

    </select>
    <br><br>


    <label>Product Image:</label>
<input type="file" name="image" accept="image/*">
<br><br>

    <button type="submit" name="add_product">Add Product</button>
</form>
