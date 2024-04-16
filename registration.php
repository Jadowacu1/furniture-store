<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="stylesheet" href="./css/registration.css" />
</head>

<body>
  <div class="container">
    <h1>Create Account</h1>
    <div class="form-group">
      <a href="login.php" class="forgot-password">I already have account</a>
    </div>
    <form id="registration-form" action="registration.php" method="POST">
      <div id="step-1">
        <div class="form-group">
          <label for="email">Email: example@domain.com</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="password">Password: contains alphanumeric with one upper case one small case letter with special character and above 8 in length </label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirm Password: it should be same as above</label>
          <input type="password" id="confirm-password" name="confirm-password" required />
        </div>
        <button type="button" onclick="nextStep()">Next</button>
      </div>
      <div id="step-2" style="display: none">
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone" pattern="^(078|072|073|079)\d{7}$" placeholder="Format: 078|079|072|073" required />
        </div>
        <div class="form-group">
          <label for="first-name">First Name:</label>
          <input type="text" id="first-name" name="first-name" required />
        </div>
        <div class="form-group">
          <label for="last-name">Last Name:</label>
          <input type="text" id="last-name" name="last-name" required />
        </div>
        <button type="button" onclick="prevStep()">Back</button>
        <button type="submit" name="ok">Sign Up</button>
      </div>
    </form>


    <script>
      function nextStep() {
        document.getElementById("step-1").style.display = "none";
        document.getElementById("step-2").style.display = "block";
      }

      function prevStep() {
        document.getElementById("step-2").style.display = "none";
        document.getElementById("step-1").style.display = "block";
      }
    </script>
    <?php
    include("connection.php");
    if (isset($_POST['ok'])) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
      $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
      $sel = mysqli_query($conn, "SELECT * FrOM users where Email = '$email'");
      function validateForm($email, $password, $firstName, $lastName, $confirmPassword, $sel)
      {
        if (mysqli_num_rows($sel) > 0) {
          echo "<h3 style ='color: red'>Email Is already Registered</h3>";
          return false;
        }
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        $passPatterns = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_]).{8,}$/';
        $namePattern = '/^[A-Z][a-zA-Z]*$/';
        if (!preg_match($emailPattern, $email)) {
          echo "invalid Email";
          return false;
        } elseif (!preg_match($passPatterns, $password)) {
          echo "<h3 style ='color: red'>Please create Strong password<h3>";
          return false;
        } elseif ($password !== $confirmPassword) {
          echo "<h3 style ='color: red'>confirm should be same as password</h3>";
        } elseif (!preg_match($namePattern, $firstName) || !preg_match($namePattern, $lastName)) {
          echo "<h3 style ='color: red'>Please provide a valid First name And Last Name</h3>";
          return false;
        } else {
          return true;
        }
      }
      if (validateForm($email, $password, $firstName, $lastName, $confirmPassword, $sel)) {

        function insertData($conn, $email, $password, $phone, $firstName, $lastName)
        {
          $hashed = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (First_Name,Last_Name,Email,Phone_Number,Password,Role) VALUES ('$firstName', '$lastName', '$email','$phone','$hashed','Admin')";

          if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data Inserted successfully');
            window.location.href = 'login.php';
           </script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        insertData($conn, $email, $password, $phone, $firstName, $lastName);
      }
    }
    ?>
  </div>
</body>

</html>