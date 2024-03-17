<?php

// ClientsModel.php

class ClientsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=Sql_resto_db', 'cv-php', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllClients() {
        $query = $this->db->query('SELECT * FROM `Clients`');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClientById($id) {    
        $query = "SELECT * FROM `Clients` WHERE id = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createClient($data) {
        $query = "INSERT INTO `Clients` (`lastname`, `firstname`, `phone`) VALUES (:lastname, :firstname, :phone)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':lastname', $data['lastname']);
        $stmt->bindValue(':firstname', $data['firstname']);
        $stmt->bindValue(':phone', $data['phone']);
        
        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function updateClient($data) {
        $query = "UPDATE `Clients`
        SET `lastname` = :lastname,
            `firstname` = :firstname,
            `phone` = :phone
        WHERE id = :id";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':lastname', $data['lastname']);
        $stmt->bindValue(':firstname', $data['firstname']);
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->bindValue(':id', $data['id']);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function deleteClient($id) {
        $query = "DELETE FROM `Clients` WHERE id = ?";
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