<?php
include 'session.php';
include 'connection.php';
$user = $_SESSION['user_id'];
$sel = mysqli_query($conn, "SELECT * FROM cart WHERE User_Id ='$user'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store - Shopping Cart</title>
    <!-- <link rel="stylesheet" href="./css/shopping-cart.css"> -->
    <style>
        .containe {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            flex-direction: row;
            margin-bottom: 10px;
        }

        .cart-item img {
            max-width: 150px;
            height: auto;
            margin-right: 20px;
        }

        .item-details {
            flex-grow: 1;
        }

        .item-details h3 {
            margin-bottom: 10px;
        }

        .item-details p {
            margin-bottom: 5px;
        }

        .item-actions button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin-right: 10px;
            cursor: pointer;
        }

        .item-actions button:hover {
            background-color: #0056b3;
        }

        .minee {
            margin-top: 304px;
        }

        /* .message {
            margin-top: 100px;
        } */
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?><br><br><br><br>


    <?php
    if (mysqli_num_rows($sel) == 0) {
        echo "<center><h2 class ='message'>You have nothing in you Shopping Cart</h2></center>";
    } else {
    ?>
        <center>
            <h2>Shopping Cart</h2>
        </center>
        <div class="containe">

            <?php
            while ($row = mysqli_fetch_row($sel)) {
            ?>
                <div class="cart-item">
                    <img src="./<?php echo $row[5]; ?>" alt="Furniture Image">
                    <div class="item-details">
                        <h3><?php echo $row[2]; ?></h3>
                        <p>Price: <?php echo $row[4]; ?></p>
                        <div class="item-actions">
                            <button class="remove-button"><a href="deleteCart.php ?id=<?php echo $row['0']; ?>" class="delete-button" style="text-decoration: none; color: white">remove</a></button>
                        </div>
                    </div>

                </div>
        <?php
            }
        }
        ?>

        </div>
        <div class="minee">
            <?php
            include 'footer.php';
            ?>
        </div>
</body>

</html>