<?php

require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>   

<?php

$page_title = 'View Product';



echo '<h1 id="mainhead">View Product</h1>';


//Make the query

$query = "SELECT * FROM product ORDER BY product_name ASC";
$result = mysqli_query($dbc, $query);

$num = mysqli_num_rows($result);

if ($num > 0) {
    echo"<p>There are currently $num registered products.</p>\n";

    //table headers
    echo'<table align="center" cellspacing="0" cellpadding="5"> <tr><td align="left"><b>Edit</b></td><td align="left"><b>Delete</b></td><td align="left"><b>Name</b></td><td align="left"><b>Product description</b></td><td align="left"><b>Product category</b></td><td align="left"><b>Price</b></td><td align="left"><b>Image</b></td></tr>';

    //fetch and print all records

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td align="left"><a href="editItems.php?id=' . $row['product_id'] . '">Edit</a></td><td align="left"><a href="deleteItem.php?id=' . $row['product_id'] . '">Delete</a></td><td align="left">' . $row['product_name'] . '</td><td align="left">' . $row['detail'] . '</td><td align="left">' . $row['category_id'] . '</td><td align="left">' . $row['price'] . '</td><td align="left"><img src= "'.$row["img_path"].'" style="width:150px;"></td></tr>';
    }
    echo '</table>';

    mysqli_free_result($result);
} else {
    echo '<p class="error">There are currently no registered product.</p>';
}
mysqli_close($dbc);
?>

<?php

include './includes/footer.php';
?>