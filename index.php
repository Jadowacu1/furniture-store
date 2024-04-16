<?php
// include 'session.php';
include('connection.php');
$sel = mysqli_query($conn, "SELECT * FROM furnitures");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Furniture Store - Customer Panel</title>
  <link rel="stylesheet" href="./css/styles.css" />
  <style>
    .minee{
      margin-top: 161px;
    }
  </style>

</head>

<body>
  <?php
  include('header.php');
  ?><br><br><br>
  <?php
  include('transition.php');
  ?>
  <?php
  if (mysqli_num_rows($sel) <= 0) {
    // echo "<h1>No furniture Yet</h1>";
  } else {
  ?>
    <div class="container">
      <?php
      while ($data = mysqli_fetch_array($sel)) {
      ?>


        <div class="furniture-item">
          <img src="./<?php echo $data['1']; ?>" alt="Furniture 1" />
          <h3><?php echo $data['2']; ?></h3>
          <p><?php echo $data['3']; ?></p>
          <p class="price">Frw <?php echo $data['4']; ?></p>
          <button class="order-button"><a href="order_form.php ?id=<?php echo $data['0']; ?>" style="text-decoration: none; color:white;">Order</a></button>
          <button class="cart-button"><a href="add_card.php?id=<?php echo $data['0']; ?>">Add to Cart</a></button>
        </div>
    <?php
      }
    }
    ?>
    </div>
    <div class="minee">
    <?php
    include('footer.php');
    ?></div>
</body>

</html>