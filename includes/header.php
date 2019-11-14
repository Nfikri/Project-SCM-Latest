<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yasui Official</title>
        <link rel="icon" href="img/slideshow/tabLogo.jpg">
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>
    <body>

        <header>
            <div class="container">
                <a href="index.php"><img src="img/newlogo.jpg" alt="logo" class="logo" style="width: 120px;height: 120px;" ></a>


                <nav class="navbar">
                    <ul>

                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a class="link" href="login.php?action=logout" style="text-decoration:none">Logout</a>';
                            } else {
                                echo '<a class="link" href="login.php" style="text-decoration:none">Login</a>';
                            }
                            ?>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "Welcome, ", $_SESSION["username"], " !";
                            } else {
                                echo '<label style="text-decoration:none">You are not logged in</label>';
                            }
                            ?>
                        </li>
                    </ul>

                </nav>
            </div>

        </header>
        <div class="ruang-kosong">
            <br>
        </div>
