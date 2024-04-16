<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <div class="container">
    <h1>Login</h1>
    <form id="login-form" action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit" name="ok">Login</button>
      </div>
    </form>
    <div class="register-link">
      <p>Don't have an account? <a href="registration.php">Register</a></p>
    </div>
    <?php
    include("connection.php");
    if (isset($_POST['ok'])) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $sel = mysqli_query($conn, "SELECT * FrOM users where Email = '$email'");
      $data = mysqli_fetch_array($sel);
      function validateForm($data, $password)
      {
        if ($data['Role'] == 'Admin') {
          if (password_verify($password, $data['Password'])) {
            session_start();
            $user_id = $_SESSION['Role'] = $data['Role'];
            header('location:furniture-registration.php');
          } else {
            echo "<h3 style ='color: red'>Invalid Email Or Password <h3>";
          }
        } elseif ($data['Role'] == 'customer') {
          if (password_verify($password, $data['Password'])) {
            session_start();
            $user_id = $_SESSION['user_id'] = $data[0];
            header('location:index.php');
          } else {
            echo "<h3 style ='color: red'>Invalid Email Or Password <h3>";
          }
        }
      }
      validateForm($data, $password);
    }
    ?>
  </div>
</body>

</html>