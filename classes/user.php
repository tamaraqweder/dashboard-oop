<?php
//الإضافة والتعديل والحذف.

class User{
    private $conn;

    public function __construct($conn){
        $this->conn=$conn;
    }
   //read
    public function getUsers(){
        $sql="SELECT * FROM users";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();


          return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getUserById($id){
      $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //add

    public function addUser($name,$email,$password,$role){
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute([$name, $email , $password , $role]);

      
    }


  //update
    public function updateUser($id, $name, $email, $password, $role) 
  {

  if ($password != "")
     {
    $password = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE users SET
            name = ?, email = ?, password = ?, role = ?
            WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$name, $email, $password, $role, $id]);
  }


  public function deleteUser($id){
    $sql="DELETE FROM users WHERE id=?";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute([$id]);
  }












    

}


?>