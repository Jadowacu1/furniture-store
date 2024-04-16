<?php
include 'session.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store - Make Order</title>
    <link rel="stylesheet" href="./css/make-order.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .minute {
            margin-top: 212px;
        }
    </style>
</head>

<body>

    <?php
    include('header.php');
    ?><br><br><br>
    <div class="container">
        <?php
        $user_Id = $_SESSION['user_id'];
        $sel = mysqli_query($conn, "SELECT Name,quantity,Price,status,date FROM orders JOIN furnitures f ON orders.Furniture_Id = f.Furniture_Id WHERE orders.User_Id ='$user_Id'");
        if (mysqli_num_rows($sel) == 0) {
            echo "<h2>You have No Order</h2>";
        } else {
        ?>
            <table>
                <tr>
                    <th>Furniture</th>
                    <th>Unity Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($sel)) {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo "Frw " . $row[2]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo "Frw  " . $row[2] * $row[1]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </table>
    </div>
    <div class="minute">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>