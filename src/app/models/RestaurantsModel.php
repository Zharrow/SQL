<?php

// RestaurantsModel.php

class RestaurantsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllRestaurants() {
        $query = $this->db->query('SELECT * FROM `Restaurants`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRestaurantById($id) {    
        $query = "SELECT * FROM `Restaurants` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createRestaurant($data) {
        $query = "INSERT INTO `Restaurants` (`name`) VALUES (:name)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':name', $data['name']);
        
        $stmt->execute();
    }

    public function updateRestaurant($data) {
        $query = "UPDATE `Restaurants`
        SET `name` = :name
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':id', $data['id']);

        $stmt->execute();
    }

    public function deleteRestaurant($id) {
        $query = "DELETE FROM `Restaurants` WHERE id = ?";
        $stmt= $this->db->prepare($query);

        $stmt->execute([$id]);
    }
}

?>