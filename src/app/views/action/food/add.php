<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food - add</title>
</head>
<body>
    <h1>Add a food: </h1>
    <form action="/food/add" method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="..." required>
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" name="price" placeholder="..." required>
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