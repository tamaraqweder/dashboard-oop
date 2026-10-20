<?php
require "classes/database.php";
require "product.php";

$database = new Database();
$conn = $database->connect();

$productObject = new Product($conn);
$products = $productObject->getProducts();
?>

<h2>Products</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Category-id</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $product) { ?>
        <tr>
            <td><?= $product["id"] ?></td>
            <td><?= $product["name"] ?></td>
            <td><?= $product["price"] ?></td>
            <td><?= $product["description"] ?></td>
            <td><?= $product["quantity"] ?></td>
            <td><?= $product["category_id"] ?></td>
            <td>
    <img src="<?= htmlspecialchars($product["image"]) ?>" width="80">
</td>
            <td>
    <a href="edit_product.php?id=<?= $product["id"] ?>">Edit</a>
       


       <form action="delete_product.php" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this product?');">

    <input type="hidden" name="id" value="<?= $product["id"] ?>">

    <button type="submit" name="delete_product">Delete</button>
</form>
</td> 
        
        
        </tr>
    <?php } ?>
</table>
<a href="add_product.php">Add Product</a>
<br><br>