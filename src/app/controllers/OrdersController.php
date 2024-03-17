<?php

// OrdersController.php

include '../app/models/OrdersModel.php';

class OrdersController {
    private $ordersModel;

    public function __construct() {
        $this->ordersModel = new OrdersModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['totalPrice']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['commandDetails']) && isset($_POST['client_id']) && isset($_POST['restaurant_id'])) {
                $data = [
                    "totalPrice" => $_POST['totalPrice'],
                    "date" => $_POST['date'],
                    "time" => $_POST['time'],
                    "commandDetails" => $_POST['commandDetails'],
                    "client_id" => $_POST['client_id'],
                    "restaurant_id" => $_POST['restaurant_id']
                ];

                $state = $this->ordersModel->createOrder($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/orders/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $order = $this->ordersModel->getOrderById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['totalPrice']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['commandDetails']) && isset($_POST['client_id']) && isset($_POST['restaurant_id'])) {
                $data = [
                    "totalPrice" => $_POST['totalPrice'],
                    "date" => $_POST['date'],
                    "time" => $_POST['time'],
                    "commandDetails" => $_POST['commandDetails'],
                    "client_id" => $_POST['client_id'],
                    "restaurant_id" => $_POST['restaurant_id'],
                    "id" => $_POST['id']
                ];

                $state = $this->ordersModel->updateOrder($data);

                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/orders/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $state = $this->ordersModel->deleteOrder($id);

        if ($state) {
            header("Location: /");
        } else {
            echo 'Error when deleting order.';
        }
    }
}

?>