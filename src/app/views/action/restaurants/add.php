<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants - add</title>
</head>
<body>
    <h1>Add a restaurant: </h1>
    <form action="/restaurant/add" method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="..." required>
        </div>
        <input type="submit" value="Add">
        <a href="/">Cancel</a>
    </form>
</body>
</html>