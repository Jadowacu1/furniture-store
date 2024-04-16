<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #121e31;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            text-align: center;
            margin-top: -55px;
            color: #007bff;
        }

        .confirmation-message {
            text-align: center;
            margin-bottom: 20px;
            color: #28a745;
            font-weight: bold;
        }

        .order-details {
            border-top: 1.5px solid #ccc;
            padding-top: 20px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details table td {
            padding: 10px;
            border-bottom: 1.5px solid #ccc;
        }

        .order-details table td:first-child {
            font-weight: bold;
            width: 30%;
        }

        .back-to-home {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-to-home a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-to-home a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Placed Orders</h1>
        <div class="confirmation-message">Your order has been successfully placed!</div>
        <div class="order-details">
            <table>

                <tr>
                    <td>Furniture:</td>
                    <td>
                        <?php
                        echo $_SESSION['name'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td>
                        <?php
                        echo $_SESSION['qty'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Total Price:</td>
                    <td>
                        <?php
                        echo "Frw " . $_SESSION['total'];
                        ?>
                    </td>
                </tr>
            </table>

        </div>
        <div class="back-to-home">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>

</html>