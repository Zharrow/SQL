<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks - update</title>
</head>
<body>
    <h1>Update a feedback: </h1>
    <form action="/feedback/update" method="POST">
        <div>
            <label for="rate">Rate:</label>
            <input type="text" name="rate" placeholder="..." value="<?php echo $feedback['rate'] ?>" required>
        </div>
        <div>
            <label for="comment">Comment: </label>
            <input type="text" name="comment" placeholder="..." value="<?php echo $feedback['comment'] ?>" required>
        </div>
        <div>
            <label for="order_id">Order_id: </label>
            <input type="number" name="order_id" placeholder="..." value="<?php echo $feedback['order_id'] ?>" required>
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