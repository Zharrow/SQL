<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addresses - update</title>
</head>
<body>
    <h1>Update a address: </h1>
    <form action="/address/update" method="POST">
        <div>
            <label for="client_id">Client_id: </label>
            <input type="number" name="client_id" placeholder="..." value="<?php echo $addresse['client_id'] ?>">
        </div>
        <div>
            <label for="street">Street: </label>
            <input type="text" name="street" placeholder="..." value="<?php echo $addresse['street'] ?>" required>
        </div>
        <div>
            <label for="postal">Postal: </label>
            <input type="text" name="postal" placeholder="..." value="<?php echo $addresse['postal'] ?>" required>
        </div>
        <div>
            <label for="city">City: </label>
            <input type="text" name="city" placeholder="..." value="<?php echo $addresse['city'] ?>" required>
        </div>
        <div>
            <label for="restaurant_id">Restaurant_id: </label>
            <input type="number" name="restaurant_id" placeholder="..." value="<?php echo $addresse['restaurant_id'] ?>">
        </div>
        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
        <input type="submit" value="Update">
        <a href="/">Cancel</a>
    </form>
</body>
</html>