<?php
require "classes/database.php";
require "classes/user.php";

$database=new Database();
$conn=$database->connect();

$userObject=new User($conn); //عشان ابني اوبجكت وامرر اله الاتصال

$id=$_GET["id"];
$user = $userObject->getUserById($id);



if(isset($_POST["update_user"])){
     $name=$_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $role = $_POST["role"];
     $userObject->updateUser($id, $name, $email, $password, $role);
     
     header("Location: users.php");
     exit;

     }

?>




<h1>Edit User</h1>

<form method="POST" action="">

    <label for="name">Name</label>
    <input
        type="text"
        id="name"
        name="name"
        value="<?= $user['name'] ?>"
    >


    <label for="email">Email</label>
    <input
    type="email"
    id="email"
    name="email"
    value="<?= $user['email'] ?>"
       >
    <br><br>



    <label for="password">New Password</label>
<input
    type="password"
    id="password"
    name="password"
   >
<br><br>


<label for="role">Role</label>

<select id="role" name="role">
    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>
        Admin
    </option>

    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>
        User
    </option>
</select>

<br><br>

<button type="submit" name="update_user">Update User</button>

</form>