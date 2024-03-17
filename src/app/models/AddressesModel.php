<?php

// AddressesModel.php

class AddressesModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllAddresses() {
        $query = $this->db->query('SELECT * FROM `Addresses`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAddressById($id) {    
        $query = "SELECT * FROM `Addresses` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAddress($data) {
        $query = "INSERT INTO `Addresses` (`client_id`, `street`, `postal`, `city`, `restaurant_id`) VALUES (:client_id, :street, :postal, :city, :restaurant_id)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':client_id', $data['client_id']);
        $stmt->bindValue(':street', $data['street']);
        $stmt->bindValue(':postal', $data['postal']);
        $stmt->bindValue(':city', $data['city']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function updateAddress($data) {
        $query = "UPDATE `Addresses`
        SET `client_id` = :client_id,
            `street` = :street,
            `postal` = :postal,
            `city` = :city,
            `restaurant_id` = :restaurant_id
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':client_id', $data['client_id']);
        $stmt->bindValue(':street', $data['street']);
        $stmt->bindValue(':postal', $data['postal']);
        $stmt->bindValue(':city', $data['city']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);
        $stmt->bindValue(':id', $data['id']);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function deleteAddress($id) {
        $query = "DELETE FROM `Addresses` WHERE id = ?";
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