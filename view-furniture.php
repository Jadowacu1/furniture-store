<?php
include 'adminSession.php';
include("connection.php");

// Pagination variables
$items_per_page = 3; // Number of items per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// Fetch furniture items with pagination
$sel = mysqli_query($conn, "SELECT * FROM furnitures LIMIT $offset, $items_per_page");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Furniture</title>
  <link rel="stylesheet" href="./css/viewFun.css" />
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
    <h2>View Furniture</h2>
    <?php
    if (mysqli_num_rows($sel) <= 0) {
      echo "<h3>No Furniture Found</h3>";
    } else {
    ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th colspan="2">Operation</th>
          </tr>
        </thead>
        <tbody>
          <!-- Furniture items will be dynamically loaded here -->
          <?php
          while ($data = mysqli_fetch_array($sel)) {
          ?>
            <tr>
              <td><?php echo $data[0]; ?></td>
              <td><?php echo $data[2]; ?></td>
              <td><?php echo $data[3]; ?></td>
              <td><?php echo $data[4]; ?> Frw</td>
              <td><a href="editFun.php?id=<?php echo $data[0]; ?>" class="edit-button">Edit</a></td>
              <td><a href="deleteFun.php?id=<?php echo $data[0]; ?>" class="delete-button">Delete</a></td>
            </tr>
          <?php
          }
          ?>
          <!-- Additional furniture items can be added here -->
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination">
        <?php
        // Count total number of furniture items
        $total_items = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM furnitures"));
        // Calculate total pages
        $total_pages = ceil($total_items / $items_per_page);

        // Generate pagination buttons
        if ($current_page > 1) {
          echo "<a href='view-furniture.php?page=" . ($current_page - 1) . "' class='prev-page'>Previous</a>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
          echo "<a href='view-furniture.php?page=$i' class='page-number'>$i</a>";
        }

        if ($current_page < $total_pages) {
          echo "<a href='view-furniture.php?page=" . ($current_page + 1) . "' class='next-page'>Next</a>";
        }
        ?>
      </div>
    <?php
    }
    ?>
  </div>

  <div class="minute">
    <?php
    include('footer.php');
    ?>
  </div>
</body>

</html>