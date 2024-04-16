<?php
include 'adminSession.php';
$conn = mysqli_connect("localhost", "root", "", "Furniture_Store");

// Pagination variables
$items_per_page = 3; // Number of customers per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// Fetch customers with pagination
$sql = mysqli_query($conn, "SELECT * FROM users where Role = 'customer' LIMIT $offset, $items_per_page ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="./css/viewCust.css">
    <!-- Include pagination CSS -->
    <link rel="stylesheet" href="./css/pagination.css">
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
</head>

<body>
    <?php
    include 'headerAdmin.php';
    ?><br><br><br>

    <div class="container">
        <h2>View Customers</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['User_Id'] ?></td>
                        <td><?php echo $row['First_Name'] ?></td>
                        <td><?php echo $row['Last_Name'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Phone_Number'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination buttons -->
        <div class="pagination">
            <?php
            // Calculate total number of customers
            $total_items = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
            // Calculate total pages
            $total_pages = ceil($total_items / $items_per_page);

            // Generate pagination buttons
            if ($current_page > 1) {
                echo "<a href='view-customers.php?page=" . ($current_page - 1) . "' class='prev-page'>Previous</a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='view-customers.php?page=$i' class='page-number'>$i</a>";
            }

            if ($current_page < $total_pages) {
                echo "<a href='view-customers.php?page=" . ($current_page + 1) . "' class='next-page'>Next</a>";
            }
            ?>
        </div>
    </div>

    <div class="minute">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>