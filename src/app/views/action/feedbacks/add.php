<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks - add</title>
</head>
<body>
    <h1>Add a feedback: </h1>
    <form action="/feedback/add" method="POST">
        <div>
            <label for="rate">Rate:</label>
            <input type="text" name="rate" placeholder="..." required>
        </div>
        <div>
            <label for="comment">Comment: </label>
            <input type="text" name="comment" placeholder="..." required>
        </div>
        <div>
            <label for="order_id">Order_id: </label>
            <input type="number" name="order_id" placeholder="..." required>
        </div>
        <input type="submit" value="Add">
        <a href="/">Cancel</a>
    </form>
</body>
</html>