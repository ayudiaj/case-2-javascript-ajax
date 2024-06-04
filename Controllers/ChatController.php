<?php
require_once '../Models/ChatModel.php';

class ChatController {
    private $model;

    public function __construct($db) {
        $this->model = new ChatModel($db);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['choose_user'])) {
                $_SESSION['user'] = $_POST['user'];
            } elseif (isset($_POST['message'])) {
                $this->model->addMessage($_SESSION['user'], $_POST['message']);
            } elseif (isset($_POST['logout'])) {
                unset($_SESSION['user']); 
            }
        }
    }

    public function getMessages() {
        return $this->model->getMessages();
    }
}
