
<?php

require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>  

<?php

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
// get the 'id' variable from the URL
    $id = $_GET['id'];

// delete record from database
    $query = "DELETE FROM product WHERE product_id = $id LIMIT 1";
    if ($result = mysqli_query($dbc, $query)) { // Worked.
         echo '<p>The product has been successfully deleted.</p>';
        
    } else { // If the query did not run OK.
        echo '<p><font color="red">Your submission could not be processed due to a system error.</font></p>';
    }
} else {
// if the 'id' variable isn't set, redirect the user
    header("Location: viewProduct.php");
}
?>

<?php

include './includes/footer.php';
?>