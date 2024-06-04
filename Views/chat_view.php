<?php
require_once '../Controllers/ChatController.php';

session_start();

$controller = new ChatController($db);
$controller->handleRequest();
$messages = $controller->getMessages();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .message {
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 10px;
        max-width: 70%;
    }

    .user1 .message {
        background-color: #d1e7dd;
        margin-right: auto;
    }

    .user2 .message {
        background-color: #f8d7da;
        margin-left: auto;
    }
</style>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Chat App</h1>
        <?php if (!isset($_SESSION['user'])): ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="user">Pilih Pengguna:</label>
                    <select name="user" id="user" class="form-control" required>
                        <option value="user1">User 1</option>
                        <option value="user2">User 2</option>
                    </select>
                </div>
                <button type="submit" name="choose_user" class="btn btn-primary">Pilih</button>
            </form>
        <?php else: ?>
            <div class="chat-container chatbox-wrapper">
            <?php foreach ($messages as $message): ?>
                <?php
                $sender = htmlspecialchars($message['sender']);
                $messageText = htmlspecialchars($message['message']);
                ?>

                <?php if ($sender == 'user1'): ?>
                    <div class="user1">
                        <div class="message">
                            <div class="sender"><?= $sender ?></div>
                            <div class="text"><?= $messageText ?></div>
                        </div>
                    </div>
                <?php elseif ($sender == 'user2'): ?>
                    <div class="user2">
                        <div class="message">
                            <div class="sender"><?= $sender ?></div>
                            <div class="text"><?= $messageText ?></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="user-other">
                        <div class="message">
                            <div class="sender"><?= $sender ?></div>
                            <div class="text"><?= $messageText ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>



        <form method="post" action="" class="form-inline fluid">
            <input type="text" name="message" class="form-control mb-2 mr-sm-2" placeholder="Type your message..." required>
            <button type="submit" class="btn btn-primary mb-2">Send</button>
        </form>
        <form method="post" action="">
            <button type="submit" name="logout" class="btn btn-danger">Log out</button>
        </form>
        </div>
        </div>
    <?php endif; ?>

    
    </div>
</body>

</html>