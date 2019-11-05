<?php
require_once 'mysql_connection.php';
include './includes/header.php';
?>  

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {

        $item_array_id = array_column($_SESSION["cart"], "productId");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'productId' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="products.php"</script>';
        } else {
            echo '<script>alert("Products already added to cart")</script>';
            echo '<script>window.location="products.php"</script>';
        }
    } else {
        $item_array = array(
            'productId' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $values) {
            if ($values["productId"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been removed")</script>';
                echo '<script>window.location="products.php"</script>';
            }
        }
    } else if ($_GET["action"] == "edit") {
        
    }
}
?>

<h2 style="text-align: center;font-weight: bold;color: #8b0434;">My Cart</h2>
<br>
<div class="container-checkout">
    <table style="width:90%;margin: 0 auto; margin: 20px;">
        <tr style="text-align: center;">
            <th style="text-align: center;">Product Name</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Price</th>
            <th style="text-align: center;">Total Price</th>
            <th style="text-align: center;">Action</th>
        </tr>
        <?php
        if (!empty($_SESSION["cart"])) {

            $total = 0;
            foreach ($_SESSION["cart"] as $keys => $values) {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><input style="width: 50px;height: 25px;text-align: center;margin: 0 auto;" type="text" value="<?php echo $values["item_quantity"] ?>" name="quantity" readonly></td>
                    <td>RM <?php echo number_format($values["product_price"], 2); ?></td>
                    <td>RM <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["productId"]; ?>"><span class="text-danger">delete</span></a> &nbsp; <a href="cart.php?action=edit&id=<?php echo $values["productId"]; ?>"><span class="text-danger">edit</span></a></td>
                </tr>
                <?php
                $total = $total + ($values["item_quantity"] * $values["product_price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right" style="font-weight: bold;">Overall Total</td>
                <td align="right">RM <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<br>

<h2 style="text-align: center;font-weight: bold;color: #8b0434;">Billing Address</h2>
<div class="row">
    <div class="col-75">
        <div class="container-checkout">

            <form name="form1" method="post" action="">
                <div class="row">
                    <div class="col-50">
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input class="type-text" type="text" id="name" name="name" placeholder="Your Full Name">

                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input class="type-text" type="text" id="adr" name="address" placeholder="Your Address">

                        <label for="city"><i class="fa fa-institution"></i> Mobile No</label>
                        <input class="type-text" type="text" id="city" name="mobile_no" placeholder="Mobile Phone Number">
                    </div>


                </div>

                <input type="submit" value="Checkout" name="checkout" class="btn-confirm">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST["checkout"])) {

    $errors = array();


    // not logged in
    if (empty($_SESSION['username'])) {
        echo '<script type="text/javascript">';
        echo 'alert("Please Log In to Checkout");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    } else {
        $valid = "true";
    }

    //Name
    if (empty($_POST['name'])) {
        $errors[] = 'Please fill name';
    } else {
        $name = $_POST['name'];
    }

    //Address
    if (empty($_POST['address'])) {
        $errors[] = 'Please fill address';
    } else {
        $address = $_POST['address'];
    }
    //mobile no
    if (empty($_POST['mobile_no'])) {
        $errors[] = 'Please fill mobile number';
    } else {
        $mobile_no = $_POST['mobile_no'];
    }


    //if no errors at all
    if (empty($errors) && !empty($_SESSION['username'])) {
        
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        //Load Composer's autoloader
        require 'vendor/autoload.php';
        $sendEmailTo = $_SESSION['username'];
        
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'foodbear.tempemail@gmail.com';                 // SMTP username
            $mail->Password = 'Food.bear1';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('foodbear.tempemail@gmail.com', '');
            $mail->addAddress($sendEmailTo);     // Add a recipient

            $body = 'Name: ' . $name . '<br>Address: ' . $address . '<br>Mobile No: ' . $mobile_no . '<br>Total Price: ' . $total;

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Shipping Details';
            $mail->Body = $body;

            $mail->send();
            echo 'Message has been sent';
            echo '<script type="text/javascript">';
            echo 'window.location.href = "checkout.php";';
            echo '</script>';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }


        $query = "select mobile_no from cart_checkout where mobile_no='$mobile_no'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) == 0) {
            $query = "insert into cart_checkout (name,address,mobile_no,grand_total) values ('$name','$address','$mobile_no','$total')";
            $result = mysqli_query($dbc, $query);

            foreach ($_SESSION["cart"] as $keys => $values) {

                $product_name = $values["item_name"];
                $product_id = $values["productId"];
                $quantity = $values["item_quantity"];
                $price = $values["product_price"];
                $total_price = $values["item_quantity"] * $values["product_price"];


                $query1 = "insert into cart (product_name,product_id,quantity,price,total_price) values ('$product_name','$product_id','$quantity','$price','$total_price')";
                $result1 = mysqli_query($dbc, $query1);
            }


            if ($result && $result1) {
                echo '<script type="text/javascript">';
                echo 'window.location.href = "checkout.php";';
                echo '</script>';
                exit();
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "checkout.php";';
            echo '</script>';
            exit();
        }
    } else {
        echo '<h4 id="mainhead">Error!</h4><p class="error">The following error(s) occured:<br />';
        foreach ($errors as $msg) {
            echo "- $msg<br />\n";
        }
        echo '</p><p>Please fill in necessary infromation.</p><p><br /></p>';
    }
}
?>
<br>






<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php
include './includes/footer.php';
?>