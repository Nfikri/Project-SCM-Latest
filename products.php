<?php
include './includes/header.php';
require_once 'mysql_connection.php';
?>  
<div align="center">
    <a href="productsSearch.php" style="text-decoration: none;">Search for specific product</a>
</div>
<div class="container">
    <p><h4 style="font-weight: 700;text-align: center;">All Products</h4></p>
<br>

<?php
$query = "select * from product ORDER BY product_id DESC";
$i = 0;
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $image_path = $row["img_path"];
        $prod_id = $row["product_id"];
        $cat_id = $row["category_id"];
        $prod_name = $row["product_name"];
        $prod_detail = $row["detail"];
        $price = $row["price"];
        ?>


        <form method="post" action="cart.php?add&id=<?php echo $row["product_id"]; ?>">
            <div style="margin: 0 auto;" align="center">
                <div class="card-container">
                    <div class="card">
                        <p><h5 style="font-weight: 500;font-weight: bold;"><?php echo $prod_name; ?></h5></p>
                        <p><img border="2" src="<?php echo $image_path; ?>" style="width: 100%;"/></p>
                        <p><h5 clas="price">RM <?php echo number_format($price, 2); ?></h5></p>
                        <p> Qty: <select style="width: 40px;" name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </p>
                        <p><input type="hidden" name="hidden_name" value="<?php echo $prod_name; ?>"></p>
                        <p><input type="hidden" name="hidden_price" value="<?php echo $price; ?>"></p>
                        <p><input type="submit" name="add" style="margin-top: 5px;background: #8b0434;font-weight: bold;color:white;" class="btn btn-default" value="Add To Cart"></p>
                    </div>   
                </div>
            </div>



        </form>


        <?php
    }// end while
}// end if mysqli_num_rows
?>

</div>



</div>


<?php
include './includes/footer.php';
?>