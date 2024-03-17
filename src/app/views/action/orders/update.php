<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - update</title>
</head>
<body>
    <h1>Update a order: </h1>
    <form action="/order/update" method="POST">
        <div>
            <label for="totalPrice">Total price: </label>
            <input type="number" name="totalPrice" placeholder="..." value="<?php echo $order['totalPrice'] ?>" required>
        </div>
        <div>
            <label for="date">Date: </label>
            <input type="date" name="date" placeholder="..." value="<?php echo $order['date'] ?>" required>
        </div>
        <div>
            <label for="time">Time: </label>
            <input type="time" name="time" placeholder="..." value="<?php echo $order['time'] ?>" required>
        </div>
        <div>
            <label for="commandDetails">Command Details: </label>
            <input type="text" name="commandDetails" placeholder="..." value="<?php echo $order['commandDetails'] ?>" required>
        </div>
        <div>
            <label for="client_id">Client_id: </label>
            <input type="number" name="client_id" placeholder="..." value="<?php echo $order['client_id'] ?>" required>
        </div>
        <div>
            <label for="restaurant_id">Restaurant_id: </label>
            <input type="number" name="restaurant_id" placeholder="..." value="<?php echo $order['restaurant_id'] ?>" required>
        </div>
        <input type="text" name="id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'] ?>" hidden>
        <input type="submit" value="Update">
        <a href="/">Cancel</a>
    </form>
    <div>
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>