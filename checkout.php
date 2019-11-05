<?php
include './includes/header.php';
require_once 'mysql_connection.php';
?> 
<center>
    <h1>Thank You for purchasing!</h1>
    <h2>An Email has been sent to you</h2>
</center>

<h2 style="text-align: center;font-weight: bold;color: #8b0434;">Your Order Summary</h2>
<br>
<div class="container-checkout">
    <table style="width:90%;margin: 0 auto; margin: 20px;">
        <tr style="text-align: center;">
            <th style="text-align: center;">Product Name</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Price</th>
            <th style="text-align: center;">Total Price</th>
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

<?php
unset($_SESSION["cart"]);
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php
include './includes/footer.php';
?>
