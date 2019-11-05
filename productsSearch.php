<?php
include './includes/header.php';
require_once 'mysql_connection.php';
?> 
<p>
<div style="text-align: center;">
    <form action="productsSearch.php" method="post">
        <input style="width: 50%;height: 30px;" type="text" name="search" placeholder="Enter product name...">
        <input type="submit" value="Search"/>
    </form> 
</div>
</p>
<p>
    <?php
    if (isset($_POST['search'])) {
        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
        $querySearch = "select * from product where product_name LIKE '%$searchq%'";
        $res = mysqli_query($dbc, $querySearch);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_array($res)) {

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
}
?>
</p>




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
<br/>






<?php
include './includes/footer.php';
?>