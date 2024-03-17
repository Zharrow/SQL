<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addresses - add</title>
</head>
<body>
    <h1>Add a address: </h1>
    <form action="/address/add" method="POST">
        <div>
            <label for="client_id">Client_id: </label>
            <input type="number" name="client_id" placeholder="...">
        </div>
        <div>
            <label for="street">Street: </label>
            <input type="text" name="street" placeholder="..." required>
        </div>
        <div>
            <label for="postal">Postal: </label>
            <input type="number" name="postal" placeholder="..." required>
        </div>
        <div>
            <label for="city">City: </label>
            <input type="text" name="city" placeholder="..." required>
        </div>
        <div>
            <label for="restaurant_id">Restaurant_id: </label>
            <input type="number" name="restaurant_id" placeholder="...">
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