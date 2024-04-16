<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <style>
        /* Styles for the form */
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form id="deleteForm" action="deleteFun.php" method="POST">
            <div class="form-group">
                <label for="confirmation">Are you sure you want to delete?</label>
            </div>
            <div class="form-group">
                <input type="submit" name="yes" value="Yes">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="no" value="No">
            </div>
        </form>
    </div>
    <?php
    include("connection.php");
    if (isset($_POST['yes'])) {
        $idi = $_POST['id'];
        $del = mysqli_query($conn, "DELETE FROM `furnitures` WHERE `furnitures`.`Furniture_Id` = '$idi'");
        if ($del) {
            header('location:view-furniture.php');
        } else {
            echo "Error deleting furniture: " . mysqli_error($conn);
        }
    }
    if (isset($_POST['no'])) {
        header('location:view-furniture.php');
    }
    ?>

</body>

</html>