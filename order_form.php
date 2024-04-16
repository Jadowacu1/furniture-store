<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #121e31;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .order-details {
            width: 50%;
            margin-right: 50px;
        }

        .order-details img {
            width: 100%;
            border-radius: 10px;
        }

        .selected-item-description {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            margin-top: -25px;
        }

        .selected-item-description h2 {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .selected-item-description p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .order-form {
            width: 30%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }

        .order-form label {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .order-form input[type="text"],
        .order-form input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .order-form input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .order-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="order-details">
            <?php
            // Fetch selected item details from the database
            $selectedItemId = $_GET['id']; // Assuming you're passing the selected item's ID through the URL
            $conn = mysqli_connect("localhost", "root", "", "Furniture_Store");
            $sql = "SELECT * FROM furnitures WHERE Furniture_Id = $selectedItemId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            // Display selected item photo and description
            echo '<img src="' . $row["Photo"] . '" alt="Furniture Photo" class="selected-item-photo">';
            echo '<div class="selected-item-description">';
            echo '<h2>' . $row["Name"] . '</h2>';
            echo '<p>Description: ' . $row["Description"] . '</p>';
            echo '<p>Price: $' . $row["Price"] . '</p>';
            echo '</div>';

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>
        <div class="order-form">
            <form action="place_order.php" method="post" id="orderForm">
                <input type="hidden" name="furniture_id" value="<?php echo $_GET['id']; ?>">
                <label for="furniture">Furniture:</label>
                <input type="text" name="furniture" id="furniture" value="<?php echo $row["Name"]; ?>" readonly>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" min="1" required oninput="calculateTotal()">
                <label for="total">Total Price:</label>
                <input type="text" name="total" id="total" readonly>
                <input type="submit" value="Place Order" name='ok'>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['ok'])) {
        $id =$_POST['furniture_id'];
        $qty = $_POST['quantity'];
        $total = $qty * $row['Price'];
        $_SESSION['qty'] = $_POST['quantity'];
        $_SESSION ['name'] = $_POST['furniture'];
        $_SESSION['total'] = $total;
    }
    ?>
    <script>
        function calculateTotal() {
            var quantity = parseInt(document.getElementById('quantity').value);
            var price = <?php echo $row["Price"]; ?>;
            var total = quantity * price;
            document.getElementById('total').value = total.toFixed(2);
        }
    </script>
    </div>
</body>

</html>