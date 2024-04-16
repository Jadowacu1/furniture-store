<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #121e31;
        }

        .search-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* flex-direction: column; */
            margin-top: -100px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-input {
            padding: 10px 40px;
            border-radius: 30px;
            border: 2px solid #ddd;
            outline: none;
            font-size: 16px;
            width: 400px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
        }

        .search-button {
            margin-top: 3px;
            padding: 10px 20px;
            background-color: #0091ff;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #0485e8;
        }

        .search-container {
            margin-bottom: 20px;
            /* Add margin to push content up */
        }

        #search_results {
            margin-top: -200px;
            /* Adjust margin-top to move results up */
        }

        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-top: 95px;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="search-container">
        <div class="search-wrapper">
            <input type="text" class="search-input" id="search_query" placeholder="Search...">
            <i class="fas fa-search search-icon"></i>
        </div>
        <div>
            <button class="search-button" onclick="search()">Search</button>
        </div>
    </div>

    <div id="search_results"></div>

    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>

    <script>
        document.getElementById('search_query').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                search();
            }
        });

        function search() {
            var searchQuery = document.getElementById('search_query').value.trim();
            if (searchQuery !== '') {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        document.getElementById('search_results').innerHTML = xhr.responseText;
                    }
                };
                xhr.open('GET', 'search_results.php?search=' + searchQuery, true);
                xhr.send();
            }
        }
    </script>
</body>

</html>