<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food - update</title>
</head>
<body>
    <h1>Update a food: </h1>
    <form action="/food/update" method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="..." value="<?php echo $food['name'] ?>" required>
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" name="price" placeholder="..." value="<?php echo $food['price'] ?>" required>
        </div>
        <div>
            <label for="restaurant_id">Restaurant_id: </label>
            <input type="number" name="restaurant_id" placeholder="..." value="<?php echo $food['restaurant_id'] ?>" required>
        </div>
        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
        <input type="submit" value="Update">
        <a href="/">Cancel</a>
    </form>
</body>
</html>