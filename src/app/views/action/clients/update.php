<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - update</title>
</head>
<body>
    <h1>Update a client: </h1>
    <form action="/client/update" method="POST">
        <div>
            <label for="lastname">Lastname: </label>
            <input type="text" name="lastname" placeholder="..." value="<?php echo $client['lastname'] ?>" required>
        </div>
        <div>
            <label for="firstname">Firstname: </label>
            <input type="text" name="firstname" placeholder="..." value="<?php echo $client['firstname'] ?>" required>
        </div>
        <div>
            <label for="phone">Phone: </label>
            <input type="text" name="phone" placeholder="..." value="<?php echo $client['phone'] ?>" required>
        </div>
        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
        <input type="submit" value="Update">
        <a href="/">Cancel</a>
    </form>
</body>
</html>