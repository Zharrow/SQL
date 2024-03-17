<?php

// AddressesController.php

include '../app/models/AddressesModel.php';

class AddressesController {
    private $addressesModel;

    public function __construct() {
        $this->addressesModel = new AddressesModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['street']) && isset($_POST['postal']) && isset($_POST['city'])) {
                $data = [
                    "client_id" => (!empty($_POST['client_id'])) ? $_POST['client_id'] : null,
                    "street" => $_POST['street'],
                    "postal" => $_POST['postal'],
                    "city" => $_POST['city'],
                    "restaurant_id" => (!empty($_POST['restaurant_id'])) ? $_POST['restaurant_id'] : null
                ];

                $state = $this->addressesModel->createAddress($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of client_id or restaurant_id don\'t exist in database.';
                }
            } else {
                $errors[] = 'Missing required informations.';
            }
        }

        require_once '../app/views/action/addresses/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $addresse = $this->addressesModel->getAddressById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['street']) && isset($_POST['postal']) && isset($_POST['city'])) {
                $data = [
                    "client_id" => (!empty($_POST['client_id'])) ? $_POST['client_id'] : null,
                    "street" => $_POST['street'],
                    "postal" => $_POST['postal'],
                    "city" => $_POST['city'],
                    "restaurant_id" => (!empty($_POST['restaurant_id'])) ? $_POST['restaurant_id'] : null,
                    "id" => $_POST['id']
                ];

                $state = $this->addressesModel->updateAddress($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to update in database. This can be because of client_id or restaurant_id don\'t exist in database.';
                }
            } else {
                $errors[] = 'Missing required informations.';
            }
        }

        require_once '../app/views/action/addresses/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $state = $this->addressesModel->deleteAddress($id);

        if ($state) {
            header("Location: /");
        } else {
            echo 'Error when deleting address.';
        }
        
    }
}

?>