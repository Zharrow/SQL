<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div>
<section class="table-container">
        <h2>Addresses</h2>
        <?php if (!empty($addresses)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Client_ID</th>
                        <th>Street</th>
                        <th>Postal</th>
                        <th>City</th>
                        <th>Restaurant_ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addresses as $address): ?>
                        <tr>
                            <td><?php echo $address['id']; ?></td>
                            <td><?php echo $address['client_id']; ?></td>
                            <td><?php echo $address['street']; ?></td>
                            <td><?php echo $address['postal']; ?></td>
                            <td><?php echo $address['city']; ?></td>
                            <td><?php echo $address['restaurant_id']; ?></td>
                            <td class='button-container'>
                                <a href='/address/update?id=<?php echo $address['id']; ?>'>
                                    <button class='update'>Update</button>
                                </a>
                                <a href='/address/remove?id=<?php echo $address['id']; ?>'>
                                    <button class='remove'>Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No addresses provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/address/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>
    
    <section class="table-container">
        <h2>Clients</h2>
        <?php if (!empty($clients)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?php echo $client['id']; ?></td>
                            <td><?php echo $client['lastname']; ?></td>
                            <td><?php echo $client['firstname']; ?></td>
                            <td><?php echo $client['phone']; ?></td>
                            <td class='button-container'>
                                <a href='/client/update?id=<?php echo $client['id']; ?>'>
                                    <button class='update'>Update</button>
                                </a>
                                <a href='/client/remove?id=<?php echo $client['id']; ?>'>
                                    <button class='remove'>Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No clients provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/client/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>

    <section class="table-container">
        <h2>Feedbacks</h2>
        <?php if (!empty($feedbacks)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rate</th>
                        <th>Comment</th>
                        <th>Order_ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <tr>
                            <td><?php echo $feedback['id']; ?></td>
                            <td><?php echo $feedback['rate']; ?></td>
                            <td><?php echo $feedback['comment']; ?></td>
                            <td><?php echo $feedback['order_id']; ?></td>
                            <td class="button-container">
                                <a href="/feedback/update?id=<?php echo $feedback['id']; ?>">
                                    <button class="update">Update</button>
                                </a>
                                <a href="/feedback/remove?id=<?php echo $feedback['id']; ?>">
                                    <button class="remove">Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No feedbacks provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/feedback/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>

    <section class="table-container">
        <h2>Foods</h2>
        <?php if (!empty($foods)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Restaurant_ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($foods as $food): ?>
                        <tr>
                            <td><?php echo $food['id']; ?></td>
                            <td><?php echo $food['name']; ?></td>
                            <td><?php echo $food['price']; ?></td>
                            <td><?php echo $food['restaurant_id']; ?></td>
                            <td class="button-container">
                                <a href="/food/update?id=<?php echo $food['id']; ?>">
                                    <button class="update">Update</button>
                                </a>
                                <a href="/food/remove?id=<?php echo $food['id']; ?>">
                                    <button class="remove">Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No foods provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/food/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>

    <section class="table-container">
        <h2>Orders</h2>
        <?php if (!empty($orders)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Command Details</th>
                        <th>Client_ID</th>
                        <th>Restaurant_ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['totalPrice']; ?></td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo $order['time']; ?></td>
                            <td><?php echo $order['commandDetails']; ?></td>
                            <td><?php echo $order['client_id']; ?></td>
                            <td><?php echo $order['restaurant_id']; ?></td>
                            <td class="button-container">
                                <a href="/order/update?id=<?php echo $order['id']; ?>">
                                    <button class="update">Update</button>
                                </a>
                                <a href="/order/remove?id=<?php echo $order['id']; ?>">
                                    <button class="remove">Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/order/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>

    <section class="table-container">
        <h2>Restaurants</h2>
        <?php if (!empty($restaurants)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($restaurants as $restaurant): ?>
                        <tr>
                            <td><?php echo $restaurant['id'] ?></td>
                            <td><?php echo $restaurant['name']; ?></td>
                            <td class="button-container">
                                <a href="/restaurant/update?id=<?php echo $restaurant['id']; ?>">
                                    <button class="update">Update</button>
                                </a>
                                <a href="/restaurant/remove?id=<?php echo $restaurant['id']; ?>">
                                    <button class="remove">Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No restaurants provided.</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="/restaurant/add">
                <button class="add">Add</button>
            </a>
        </div>
    </section>
</body>
</html>