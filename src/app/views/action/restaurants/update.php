<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants - update</title>
</head>
<body>
    <h1>Update a restaurant: </h1>
    <form action="/restaurant/update" method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="..." value="<?php echo $restaurant['name'] ?>" required>
        </div>
        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
        <input type="submit" value="Update">
        <a href="/">Cancel</a>
    </form>
</body>
</html>