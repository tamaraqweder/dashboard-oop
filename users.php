<?php
require "classes/database.php";
require "classes/user.php";


$database=new Database();
$conn=$database->connect();

$userObject=new User($conn); //عشان ابني اوبجكت وامرر اله الاتصال

$users=$userObject->getUsers();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

    <h1>Users List</h1>
  
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
   <?php foreach($users as $oneUser): ?>
       <tr>
        <td> <?= $oneUser["id"] ?></td>
        <td> <?= $oneUser["name"] ?></td>
        <td> <?= $oneUser["email"] ?></td>
        <td> <?= $oneUser["role"] ?></td>
        <td><a href="edit-user.php?id=<?= $oneUser['id'] ?>">Edit</a></td>
        <td><a href="confirm-delete.php?id=<?= $oneUser['id'] ?>">Delete</a></td>

         


       </tr>

    <?php  endforeach; ?>
 </table>

 <a href="add-user.php">Add User</a>

 <hr>







</body>
</html>