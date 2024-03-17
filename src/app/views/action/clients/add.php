<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - add</title>
</head>
<body>
    <h1>Add a client: </h1>
    <form action="/client/add" method="POST">
        <div>
            <label for="lastname">Lastname: </label>
            <input type="text" name="lastname" placeholder="..." required>
        </div>
        <div>
            <label for="firstname">Firstname: </label>
            <input type="text" name="firstname" placeholder="..." required>
        </div>
        <div>
            <label for="phone">Phone: </label>
            <input type="text" name="phone" placeholder="..." required>
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