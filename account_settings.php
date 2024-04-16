<?php include 'session.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account Settings</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
    }

    .pcontainer {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    footer {
      margin-top: 50px;
      text-align: center;
      color: #888;
    }

    .cp {
      color: red;
    }
  </style>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="pcontainer">
    <h2>Change Password</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="current-password">Current Password:</label>
        <input type="password" id="current-password" name="current-password" required />
      </div>
      <div class="form-group">
        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new-password" required />
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm New Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required />
      </div>
      <button type="submit">Change Password</button>
    </form>
    <?php
        // Include database connection
        $conn = mysqli_connect("localhost", "root", "", "Furniture_Store");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $currentPassword = $_POST['current-password'];
            $newPassword = $_POST['new-password'];
            $confirmPassword = $_POST['confirm-password'];

            // Get user ID from session
            $userId = $_SESSION['user_id'];

            // Validate current password
            $sql = "SELECT Password FROM users WHERE User_Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashedPassword = $row['Password'];
                if (password_verify($currentPassword, $hashedPassword)) {
                    // Current password is correct, proceed to update password
                    if ($newPassword === $confirmPassword) {
                        // Hash the new password
                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        // Update user's password in the database
                        $updateSql = "UPDATE users SET Password = ? WHERE User_Id = ?";
                        $updateStmt = $conn->prepare($updateSql);
                        $updateStmt->bind_param('si', $hashedNewPassword, $userId);
                        if ($updateStmt->execute()) {
                            // Password updated successfully
                            echo '<script>alert("Password Changed successfully.");</script>';
                        } else {
                            echo '<p class = "cp">Failed to update password. Please try again later.</p>';
                        }
                    } else {
                        echo '<p class = "cp">Password mismatch.</p>';
                    }
                } else {
                    echo '<p class = "cp">Password is incorrect. Please try again.</p>';
                }
            } else {
                echo '<p class = "cp">User not found.</p>';
            }
        }
      ?>
  </div>

  <footer>
    <?php include('footer.php'); ?>
  </footer>
</body>

</html>