<?php

// RestaurantsController.php

include '../app/models/RestaurantsModel.php';

class RestaurantsController {
    private $restaurantsModel;

    public function __construct() {
        $this->restaurantsModel = new RestaurantsModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'])) {
                $data = [
                    "name" => $_POST['name']
                ];

                $state = $this->restaurantsModel->createRestaurant($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/restaurants/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $restaurant = $this->restaurantsModel->getRestaurantById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'])) {
                $data = [
                    "name" => $_POST['name'],
                    "id" => $_POST['id']
                ];

                $state = $this->restaurantsModel->updateRestaurant($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/restaurants/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $state = $this->restaurantsModel->deleteRestaurant($id);
        
        if ($state) {
            header("Location: /");
        } else {
            echo 'Error when deleting order.';
        }
    }
}

?>