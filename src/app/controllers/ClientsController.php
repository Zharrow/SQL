<?php

// ClientsController.php

include '../app/models/ClientsModel.php';

class ClientsController {
    private $clientsModel;

    public function __construct() {
        $this->clientsModel = new ClientsModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['phone'])) {
                $data = [
                    "lastname" => $_POST['lastname'],
                    "firstname" => $_POST['firstname'],
                    "phone" => $_POST['phone']
                ];

                $this->clientsModel->createClient($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
            }
        }

        require_once '../app/views/action/clients/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $client = $this->clientsModel->getClientById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['phone'])) {
                $data = [
                    "lastname" => $_POST['lastname'],
                    "firstname" => $_POST['firstname'],
                    "phone" => $_POST['phone'],
                    "id" => $_POST['id']
                ];

                $this->clientsModel->updateClient($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
            }
        }

        require_once '../app/views/action/clients/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $this->clientsModel->deleteClient($id);
        header("Location: /");
    }
}

?>