<?php

// FoodModel.php

class FoodModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllFoods() {
        $query = $this->db->query('SELECT * FROM `Food`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFoodById($id) {    
        $query = "SELECT * FROM `Food` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createFood($data) {
        $query = "INSERT INTO `Food` (`name`, `price`, `restaurant_id`) VALUES (:name, :price, :restaurant_id)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':price', $data['price']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);
        
        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function updateFood($data) {
        $query = "UPDATE `Food`
        SET `name` = :name,
            `price` = :price,
            `restaurant_id` = :restaurant_id
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':price', $data['price']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);
        $stmt->bindValue(':id', $data['id']);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function deleteFood($id) {
        $query = "DELETE FROM `Food` WHERE id = ?";
        $stmt= $this->db->prepare($query);

        try {
            $stmt->execute([$id]);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}

?>