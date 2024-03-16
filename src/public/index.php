<?php

$requestUri = $_SERVER['REQUEST_URI'];

$path = explode('?', $requestUri)[0];

switch ($path) {
    case '/':
        // Dashboard to manage data in tables
        require_once '../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->dashboard();
        break;

    // Address handlers
    case '/address/add':
        require_once '../app/controllers/AddressesController.php';
        $controller = new AddressesController();
        $controller->add();
        break;
    case '/address/update':
        require_once '../app/controllers/AddressesController.php';
        $controller = new AddressesController();
        $controller->update();
        break;
    case '/address/remove':
        require_once '../app/controllers/AddressesController.php';
        $controller = new AddressesController();
        $controller->remove();
        break;

    // Clients handlers
    case '/client/add':
        require_once '../app/controllers/ClientsController.php';
        $controller = new ClientsController();
        $controller->add();
        break;
    case '/client/update':
        require_once '../app/controllers/ClientsController.php';
        $controller = new ClientsController();
        $controller->update();
        break;
    case '/client/remove':
        require_once '../app/controllers/ClientsController.php';
        $controller = new ClientsController();
        $controller->remove();
        break;

    // Feebacks handlers
    case '/feedback/add':
        require_once '../app/controllers/FeedbacksController.php';
        $controller = new FeedbacksController();
        $controller->add();
        break;
    case '/feedback/update':
        require_once '../app/controllers/FeedbacksController.php';
        $controller = new FeedbacksController();
        $controller->update();
        break;
    case '/feedback/remove':
        require_once '../app/controllers/FeedbacksController.php';
        $controller = new FeedbacksController();
        $controller->remove();
        break;

    // Food handlers
    case '/food/add':
        require_once '../app/controllers/FoodController.php';
        $controller = new FoodController();
        $controller->add();
        break;
    case '/food/update':
        require_once '../app/controllers/FoodController.php';
        $controller = new FoodController();
        $controller->update();
        break;
    case '/food/remove':
        require_once '../app/controllers/FoodController.php';
        $controller = new FoodController();
        $controller->remove();
        break;

    // Orders handlers
    case '/order/add':
        require_once '../app/controllers/OrdersController.php';
        $controller = new OrdersController();
        $controller->add();
        break;
    case '/order/update':
        require_once '../app/controllers/OrdersController.php';
        $controller = new OrdersController();
        $controller->update();
        break;
    case '/order/remove':
        require_once '../app/controllers/OrdersController.php';
        $controller = new OrdersController();
        $controller->remove();
        break;

    // Restaurants handlers
    case '/restaurant/add':
        require_once '../app/controllers/RestaurantsController.php';
        $controller = new RestaurantsController();
        $controller->add();
        break;
    case '/restaurant/update':
        require_once '../app/controllers/RestaurantsController.php';
        $controller = new RestaurantsController();
        $controller->update();
        break;
    case '/restaurant/remove':
        require_once '../app/controllers/RestaurantsController.php';
        $controller = new RestaurantsController();
        $controller->remove();
        break;
        
    default:
        // Page d'erreur 404
        http_response_code(404);
        require_once '../app/controllers/Error404Controller.php';
        $controller = new Error404Controller();
        $controller->error404();
        break;
}