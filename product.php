
<?php

class Product {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all products with their category names
    public function getProducts() {
        $sql = "SELECT products.*, categories.name AS category_name
                FROM products
                LEFT JOIN categories
                ON products.category_id = categories.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get one product by ID
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    // Get all categories
public function getCategories() {
    $sql = "SELECT * FROM categories";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Add a new product
    public function addProduct($name, $price, $description, $quantity, $category_id,$image) {
        $sql = "INSERT INTO products
                (name, price, description, quantity, category_id,image)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $name,
            $price,
            $description,
            $quantity,
            $category_id,
            $image
        ]);
    }

    // Update an existing product
 public function updateProduct($id, $name, $price, $description, $quantity, $category_id, $image) {

    $sql = "UPDATE products
            SET name = ?,
                price = ?,
                description = ?,
                quantity = ?,
                category_id = ?,
                image = ?
            WHERE id = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        $name,
        $price,
        $description,
        $quantity,
        $category_id,
        $image,
        $id
    ]);
}

    // Delete a product
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

}
?>
