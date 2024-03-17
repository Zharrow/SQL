<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - add</title>
</head>
<body>
    <h1>Add a order: </h1>
    <form action="/order/add" method="POST">
        <div>
            <label for="totalPrice">Total price: </label>
            <input type="number" name="totalPrice" placeholder="..." required>
        </div>
        <div>
            <label for="date">Date: </label>
            <input type="date" name="date" placeholder="..." required>
        </div>
        <div>
            <label for="time">Time: </label>
            <input type="time" name="time" placeholder="..." required>
        </div>
        <div>
            <label for="commandDetails">Command Details: </label>
            <input type="text" name="commandDetails" placeholder="..." required>
        </div>
        <div>
            <label for="client_id">Client_id: </label>
            <input type="number" name="client_id" placeholder="..." required>
        </div>
        <div>
            <label for="restaurant_id">Restaurant_id: </label>
            <input type="number" name="restaurant_id" placeholder="..." required>
        </div>
        <input type="submit" value="Add">
        <a href="/">Cancel</a>
    </form>
    <div>
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>