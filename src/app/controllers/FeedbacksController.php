<?php

// FeedbacksController.php

include '../app/models/FeedbacksModel.php';

class FeedbacksController {
    private $feedbacksModel;

    public function __construct() {
        $this->feedbacksModel = new FeedbacksModel();
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['rate']) && isset($_POST['comment']) && isset($_POST['order_id'])) {
                $data = [
                    "rate" => $_POST['rate'],
                    "comment" => $_POST['comment'],
                    "order_id" => $_POST['order_id']
                ];

                $state = $this->feedbacksModel->createFeedback($data);
                
                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value or the order_id you provide doesn\t exist.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/feedbacks/add.php';
    }

    public function update() {
        $errors = [];

        $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

        $feedback = $this->feedbacksModel->getFeedbackById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['rate']) && isset($_POST['comment']) && isset($_POST['order_id'])) {
                $data = [
                    "rate" => $_POST['rate'],
                    "comment" => $_POST['comment'],
                    "order_id" => $_POST['order_id'],
                    "id" => $_POST['id']
                ];

                $state = $this->feedbacksModel->updateFeedback($data);
                
                if ($state) {
                    header("Location: /");
                } else {
                    $errors[] = 'Unable to create in database. This can be because of you send wrong type of value or the order_id you provide doesn\t exist.';
                }
            } else {
                echo 'Missing required informations';
            }
        }

        require_once '../app/views/action/feedbacks/update.php';
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $state = $this->feedbacksModel->deleteFeedback($id);
        
        if ($state) {
            header("Location: /");
        } else {
            echo 'Error when deleting feedback.';
        }
    }
}

?>