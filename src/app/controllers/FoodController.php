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

                $state = $this->foodModel->createFood($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
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

                $state = $this->foodModel->updateFood($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/food/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $state = $this->foodModel->deleteFood($id);

        if ($state) {
            header("Location: /");
        } else {
            echo 'Error when deleting food.';
        }
    }
}

?>