<?php
include 'headerAdmin.php';
?><br><br><br><br><br>
<?php
include 'connection.php';
?>
<style>
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        margin: 0 5px;
        background-color: #f2f2f2;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .prev-page,
    .next-page {
        font-weight: bold;
    }

    .page-number {
        font-weight: bold;
    }
</style>
<?php

// $user_Id = $_SESSION['user_id'];
include 'connection.php';

// Pagination logic
$records_per_page = 2; // Change this value as needed
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $records_per_page;

// Query to fetch orders with pagination
$query = "SELECT Order_Id, furnitures.Name, users.First_Name, users.Last_Name, Quantity, Status 
          FROM furnitures 
          JOIN orders ON furnitures.Furniture_Id = orders.Furniture_Id 
          JOIN users ON orders.User_Id = users.User_Id
          LIMIT $start_from, $records_per_page";
$sel = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Handling</title>
    <link rel="stylesheet" href="./css/order.css">
    <style>
        footer {
            text-align: center;
            padding: 44px 0;
            margin-top: 250px;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>


    <?php
    if (mysqli_num_rows($sel) == 0) {
        echo "<h1>No Orders made</h1>";
    } else {
    ?>
        <div class="container">
            <h2>Order Handling</h2>
            <form method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($sel)) {
                        ?>
                            <tr>
                                <td><?php echo $row['First_Name'] . " " . $row['Last_Name'] ?></td>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Quantity'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
                                <td>
                                    <button type="submit" class="action-button"><a href="editOrder.php?id=<?php echo $row['Order_Id'] ?>">Process</a></button>
                                    <button type="submit" class="action-button"><a href="deleteOrder.php?id=<?php echo $row['Order_Id'] ?>">Cancel</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>

            <!-- Pagination buttons -->
            <div class="pagination">
                <?php
                $page_query = "SELECT * FROM orders";
                $page_result = mysqli_query($conn, $page_query);
                $total_records = mysqli_num_rows($page_result);
                $total_pages = ceil($total_records / $records_per_page);

                echo "<a href='order-handling.php?page=1' class='page-number'>First</a> ";

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='order-handling.php?page=" . $i . "' class='page-number'>" . $i . "</a> ";
                }

                echo "<a href='order-handling.php?page=" . $total_pages . "' class='page-number'>Last</a>";
                ?>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="minute">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>