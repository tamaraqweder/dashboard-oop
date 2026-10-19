<?php
$id = $_GET["id"];



?>


<h1>Delete User</h1>

<p>Are you sure you want to delete this user?</p>

<form action="delete-user.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">

    <button type="submit" name="confirm_delete">Yes, Delete</button>
</form>

<a href="users.php">Cancel</a>