<?php

// OrdersModel.php

class OrdersModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllOrders() {
        $query = $this->db->query('SELECT * FROM `Orders`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id) {    
        $query = "SELECT * FROM `Orders` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createOrder($data) {
        $query = "INSERT INTO `Orders` (`totalPrice`, `date`, `time`, `commandDetails`, `client_id`, `restaurant_id`) VALUES (:totalPrice, :date, :time, :commandDetails, :client_id, :restaurant_id)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':totalPrice', $data['totalPrice']);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':time', $data['time']);
        $stmt->bindValue(':commandDetails', $data['commandDetails']);
        $stmt->bindValue(':client_id', $data['client_id']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);
        
        $stmt->execute();
    }

    public function updateOrder($data) {
        $query = "UPdATE `Orders`
        SET `totalPrice` = :totalPrice,
            `date` = :date,
            `time` = :time,
            `commandDetails` = :commandDetails,
            `client_id` = :client_id,
            `restaurant_id` = :restaurant_id
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':totalPrice', $data['totalPrice']);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':time', $data['time']);
        $stmt->bindValue(':commandDetails', $data['commandDetails']);
        $stmt->bindValue(':client_id', $data['client_id']);
        $stmt->bindValue(':restaurant_id', $data['restaurant_id']);
        $stmt->bindValue(':id', $data['id']);

        $stmt->execute();
    }

    public function deleteOrder($id) {
        $query = "DELETE FROM `Orders` WHERE id = ?";
        $stmt= $this->db->prepare($query);

        $stmt->execute([$id]);
    }
}

?>