<?php
require "classes/database.php";
require "classes/user.php";


$database=new Database();
$conn=$database->connect();

$userObject=new User($conn); //عشان ابني اوبجكت وامرر اله الاتصال



if(isset($_POST["add_user"])){
     $name=$_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $role = $_POST["role"];

     $userObject->addUser($name,$email,$password,$role);
       header("Location: users.php");
       exit;
}



?>


<h1>Add User </h1>



<form method="POST" action="">

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <br><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <br><br>
    <label for="role">Role</label>
   <select id="role" name="role" required>
    <option value="">Select Role</option>
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select>
    <br><br>

    <button type="submit" name="add_user">Add User</button>

</form>
