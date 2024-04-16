<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $idi = $_GET['id'];
    $sel = mysqli_query($conn, "SELECT * FROM furnitures where Furniture_Id  = '$idi'");
    $row = mysqli_fetch_array($sel);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Registration</title>
    <link rel="stylesheet" href="./css/fun.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="furniture-registration.php">Furniture Registration</a></li>
                <li><a href="view-furniture.php">View Furniture</a></li>
                <li><a href="view-customers.php">View Customers</a></li>
                <li><a href="order-handling.php">Order Handling</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Furniture Registration</h2>
        <form action="editFun.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="number" name="id" value="<?php echo $idi ?>" hidden />
                <label for="furniture-name">Furniture Name:</label>
                <input type="text" id="furniture-name" name="name" required value="<?php echo $row['Name'] ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $row['Description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required value="<?php echo $row['Price'] ?>" />
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="photo" accept="image/*" required value="<?php echo $row['Photo'] ?>" />
            </div>
            <div class="form-group">
                <input type="submit" value="Edit" name="ok" class="button" />
            </div>
        </form>
        <?php
        if (isset($_POST['ok'])) {
            function uploadFile($file)
            {
                $target_dir = "./images/"; // Directory where the file will be stored
                $target_file = $target_dir . basename($file["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($file["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($file["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($file["tmp_name"], $target_file)) {
                        return $target_file;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $photo = mysqli_real_escape_string($conn, uploadFile($_FILES['photo']));

            $sql = mysqli_query($conn, "UPDATE  `furnitures` set Photo ='$photo',Name ='$name', Description ='$description',Price='$price' WHERE `furnitures`.`Furniture_Id` = '$id'");
            if ($sql) {
                header('location:view-furniture.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        ?>
    </div>

    <footer>
        <p>&copy; 2024 Furniture Store</p>
    </footer>
</body>

</html>