<?php
  

  class Catogory{
    private $conn;

    public function __construct($conn){
        $this->conn=$conn;
    }


    public function getCategories(){
        $sql="SELECT * FROM categories";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getCategoryById($id) 
    {
       $sql="SELECT * FROM categories where id=?";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($name)
    {
         $sql = "INSERT INTO categories (name) VALUES (?)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([$name]);
    }


    public function updateCategory($id, $name)
    {
    $sql = "UPDATE categories SET name = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$name, $id]);


    }


    public function deleteCategory($id)
    {
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    }

 
  }


?>