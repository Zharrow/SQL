<?php

// DashboardController.php

include '../app/models/AddressesModel.php';
include '../app/models/ClientsModel.php';
include '../app/models/FeedbacksModel.php';
include '../app/models/FoodModel.php';
include '../app/models/OrdersModel.php';
include '../app/models/RestaurantsModel.php';

class DashboardController {
    private $addressesModel;
    private $clientsModel;
    private $feedbacksModel;
    private $foodModel;
    private $ordersModel;
    private $restaurantsModel;

    public function __construct() {
        $this->addressesModel = new AddressesModel();
        $this->clientsModel = new ClientsModel();
        $this->feedbacksModel = new FeedbacksModel();
        $this->foodModel = new FoodModel();
        $this->ordersModel = new OrdersModel();
        $this->restaurantsModel = new RestaurantsModel();
    }

    public function dashboard() {
        $addresses = $this->addressesModel->getAllAddresses();
        $clients = $this->clientsModel->getAllClients();
        $feedbacks = $this->feedbacksModel->getAllFeedbacks();
        $foods = $this->foodModel->getAllFoods();
        $orders = $this->ordersModel->getAllOrders();
        $restaurants = $this->restaurantsModel->getAllRestaurants();

        require_once '../app/views/dashboard.php';
    }
}

?>