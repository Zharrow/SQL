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

                $this->restaurantsModel->createRestaurant($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
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

                $this->restaurantsModel->updateRestaurant($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
            }
        }

        require_once '../app/views/action/restaurants/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $this->restaurantsModel->deleteRestaurant($id);
        header("Location: /");
    }
}

?>