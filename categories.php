<?php

require "classes/database.php";
require "category.php";

$database = new Database();
$conn = $database->connect();

$categoryObject = new Catogory($conn);


$categories=$categoryObject->getCategories();

?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
    <th>Action</th>

        
    </tr>

       <?php
        foreach ($categories as $category) { ?>
        <tr>
            <td><?php echo $category["id"]; ?></td>
            <td><?php echo htmlspecialchars($category["name"]); ?></td>
            <td> <a href="edit_category.php?id=<?php echo $category['id']; ?>">Edit</a>

     <form action="delete_category.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

    <button type="submit" name="delete_category"
        onclick="return confirm('Are you sure you want to delete this category?')">
    Delete
</button>
</form>
         </td>
            
        </tr>
       <?php }
     ?>

</table>
<a href="add_category.php">Add Category</a>

