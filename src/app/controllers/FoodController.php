<?php

// FoodController.php

include '../app/models/FoodModel.php';

class FoodController {
    private $foodModel;

    public function __construct() {
        $this->foodModel = new FoodModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['restaurant_id'])) {
                $data = [
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "restaurant_id" => $_POST['restaurant_id']
                ];

                $this->foodModel->createFood($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
            }
        }

        require_once '../app/views/action/food/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $food = $this->foodModel->getFoodById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['restaurant_id'])) {
                $data = [
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "restaurant_id" => $_POST['restaurant_id'],
                    "id" => $_POST['id']
                ];

                $this->foodModel->updateFood($data);
                header("Location: /");
            } else {
                echo 'Give all the required informations';
            }
        }

        require_once '../app/views/action/food/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $this->foodModel->deleteFood($id);
        header("Location: /");
    }
}

?>