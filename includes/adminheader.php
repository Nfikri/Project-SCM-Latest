<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yasui Official</title>
        <link rel="icon" href="img/slideshow/tabLogo.jpg">
        <meta charset="UTF-8">
        <link href="./css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>

        <header>
            <div class="container">
                <a href="index.php"><img src="img/newlogo.jpg" alt="logo" class="logo" style="width: 120px;height: 120px;" ></a>


                <nav class="navbar">
                    <ul>

                        <li><a href="adminindex.php">Home</a></li>

                        <li><div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Product
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="viewProduct.php">Edit/Delete Items</a></li>
                                    <li><a href="addItem.php">Add New Item</a></li>
                                </ul>
                            </div></li>

                        <li><div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="AdminAccount.php">Edit/Delete Account</a></li>
                                    <li><a href="addAccount.php">Add New Account</a></li>
                                </ul>
                            </div></li>

                        <li><?php
                            if (isset($_SESSION['username'])) {
                                echo '<a class="link" href="login.php?action=logout" style="text-decoration:none">Logout</a>';
                            } else {
                                echo '<a class="link" href="login.php" style="text-decoration:none">Login</a>';
                            }
                            ?></li>
                        <li><?php
                            if (isset($_SESSION['username'])) {
                                echo "Welcome, ", $_SESSION["username"], " !";
                            } else {
                                echo '<label style="text-decoration:none">You are not logged in</label>';
                            }
                            ?></li>
                    </ul>

                </nav>
            </div>

        </header>
        <div class="ruang-kosong">
            <br>
        </div>
