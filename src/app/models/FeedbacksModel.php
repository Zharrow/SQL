<?php

// FeedbacksModel.php

class FeedbacksModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllFeedbacks() {
        $query = $this->db->query('SELECT * FROM `Feedbacks`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFeedbackById($id) {    
        $query = "SELECT * FROM `Feedbacks` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createFeedback($data) {
        $query = "INSERT INTO `Feedbacks` (`rate`, `comment`, `order_id`) VALUES (:rate, :comment, :order_id)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':rate', $data['rate']);
        $stmt->bindValue(':comment', $data['comment']);
        $stmt->bindValue(':order_id', $data['order_id']);
        
        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function updateFeedback($data) {
        $query = "UPDATE `Feedbacks`
        SET `rate` = :rate,
            `comment` = :comment,
            `order_id` = :order_id
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':rate', $data['rate']);
        $stmt->bindValue(':comment', $data['comment']);
        $stmt->bindValue(':order_id', $data['order_id']);
        $stmt->bindValue(':id', $data['id']);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function deleteFeedback($id) {
        $query = "DELETE FROM `Feedbacks` WHERE id = ?";
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