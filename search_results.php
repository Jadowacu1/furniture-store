<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Add your CSS styles here -->
    <style>
        .furniture {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .furniture img {
            max-width: 150px;
            /* Adjust the width of the photo */
            height: auto;
            border-radius: 5px;
            /* Rounded corners for the photo */
            margin-right: 20px;
            /* Add space between the photo and the text */
        }

        .furniture-info {
            flex: 1;
        }

        .furniture h3 {
            margin: 0;
            /* Remove default margin */
        }

        .description {
            margin-top: 10px;
            /* Add space between the name and description */
        }

        .price {
            font-weight: bold;
            /* Make price text bold */
        }

        .order-button {
            background-color: green;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .order-button:hover {
            background-color: #9b5a00;
        }
    </style>
</head>

<body>
    <h2>Search Results:</h2>
    <?php
    $conn = new mysqli("localhost", "root", "", "Furniture_Store");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];
        $sql = "SELECT * FROM furnitures WHERE Name LIKE '%$search_query%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="furniture">';
                echo '<img src="' . $row['Photo'] . '" alt="' . $row['Name'] . '">';
                echo '<div class="furniture-info">';
                echo '<h3>' . $row['Name'] . '</h3>';
                echo '<p class="description">' . $row['Description'] . '</p>';
                echo '<p class="price">Price: Frw ' . $row['Price'] . '</p>';
                echo '<button class="order-button"><a href="order_form.php?id=' . $row["Furniture_Id"] . '" style = "text-decoration: none; color: white;">Order</a></button>';
                echo '</div>'; // End furniture-info
                echo '</div>'; // End furniture
            }
        } else {
            echo 'No results found.';
        }
    }

    $conn->close();
    ?>

</body>

</html>