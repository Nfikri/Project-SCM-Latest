<?php
require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>  
<script type="text/javascript">
    function Checkradiobutton()
    {

        if (document.getElementById('r1'))
        {

            document.getElementById('textEdit').disabled = true;
            document.getElementById('textEdit1').disabled = true;
            document.getElementById('textEdit2').disabled = false;

        } else {
            document.getElementById('textEdit').disabled = false;
            document.getElementById('textEdit1').disabled = false;
            document.getElementById('textEdit2').disabled = false;
        }
    }
    function Checkradiobutton2()
    {

        if (document.getElementById('r2'))
        {

            document.getElementById('textEdit').disabled = false;
            document.getElementById('textEdit1').disabled = false;
             document.getElementById('textEdit2').disabled = true;

        } else {
            document.getElementById('textEdit').disabled = true;
            document.getElementById('textEdit1').disabled = true;
             
        }
    }
</script>

<?php
if (isset($_POST['submitted'])) { // Check if the form has been submitted.
    // Validate the print_name, image, artist (existing or first_name, last_name, middle_name), size, price, and description.
    // Check for a print name.
    if (!empty($_POST['product_name'])) {
        $pn = ($_POST['product_name']);
    } else {
        $pn = FALSE;
        echo '<p><font color="red">Please enter the product name!</font></p>';
    }

    // Check for an image.
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $target_file = 'img/products/' . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) { // Move the file over.
            echo '<p>The file has been uploaded!</p>';
            $i ='img/products/'. $_FILES['image']['name'];
        } else { // Couldn't move the file over.
            echo '<p><font color="red">The file could not be moved.</font></p>';
            $i = FALSE;
        }
    } else {
        $i = FALSE;
    }

    // Check for a price.
    if (is_numeric($_POST['price'])) {
        $p = (float) $_POST['price'];
    } else {
        $p = FALSE;
        echo '<p><font color="red">Please enter the print\'s price!</font></p>';
    }

    // Check for a description (not required).
    if (!empty($_POST['description'])) {
        $d = ($_POST['description']);
    } else {
        $d = '<i>No description available.</i>';
    }

    // Validate the product category
    if ($_POST['product_category'] == 'new') {


        if (!empty($_POST['category_id'])) {
            $cat_id=  $_POST['category_id'];
        } else {
            $cat_id= 'NULL, ';
        }

        if (!empty($_POST['category_name'])) {
            $cat_name = $_POST['category_name'];
            $a= $_POST['category_id'];
        } else {
            $cat_name= 'NULL, ';
        }
        
     if ($cat_id && $cat_name) {  
          $query = "INSERT INTO product_category(category_id,cat_name) VALUES ('$cat_id', '$cat_name')";
        if ($result = mysqli_query($dbc, $query)) { // Worked.
            echo '<p>The category has been added.</p>';
        } else { // If the query did not run OK.
            echo '<p><font color="red">Your submission could not be processed due to a system error.</font></p>';
        }
     }
        
    } elseif (($_POST['product_category'] == 'existing') && ($_POST['existing'] > 0)) { // Existing artist.
        $a = $_POST['existing'];
    } else { // No category selected.
        $a = FALSE;
        echo '<p><font color="red">Please enter or select the product category!</font></p>';
    }

    // confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
// get the 'id' variable from the URL
    $id = $_GET['id'];
    
        $query = "UPDATE product SET category_id='$a',product_name='$pn',detail='$d', price='$p', img_path='$i' WHERE product_id='$id'";
        if ($result = mysqli_query($dbc, $query)) { // Worked.
            echo '<p>The product has been updated.</p>';
        } else { // If the query did not run OK.
            echo '<p><font color="red">Your submission could not be processed due to a system error.</font></p>';
        }
    } else { // Failed a test.
        echo '<p><font color="red">Please click "back" and try again.</font></p>';
    }
} else { // Display the form.
    ?>

    <form enctype="multipart/form-data" action="" method="post">

        <input type="hidden" name="MAX_FILE_SIZE" value="524288">

        <fieldset><legend>Fill out the form to edit the product to the catalog:</legend>

            <p><b>Product Name:</b> <input type="text" name="product_name" size="30" maxlength="60" /></p>

            <p><b>Image:</b> <input type="file" name="image" /> <small>The file name should not include spaces or other invalid characters and should have a file extension.</small></p>

              <p><b>Product Category:</b> 
            <p><input type="radio" name="product_category" value="existing" id="r1" onclick="Checkradiobutton()" /> Existing :
                <select name="existing" id="textEdit2" ><option>Select One</option>
                    <?php
                    // Retrieve all the artists and add to the pull-down menu.
                    $query = "SELECT * from product_category Order by cat_name ASC";
                    $result = mysqli_query($dbc, $query);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<option value=\"{$row['category_id']}\">{$row['cat_name']}</option>\n";
                    }
                    mysqli_close($dbc); // Close the database connection.
                    ?>
                </select></p>
            <p>
                <input type="radio" name="product_category" value="new" id="r2" onclick="Checkradiobutton2()" /> New :<br/>
                Category Id: <input type="text" name="category_id" size="10" maxlength="20" id="textEdit">
                Category Name: <input type="text" name="category_name" size="10" maxlength="20" id="textEdit1"/>
            </p>

            <p><b>Price:</b> <input type="text" name="price" size="10" maxlength="10" /> <small>Do not include the dollar sign or commas.</small></p>


            <p><b>Description:</b></p><p> <textarea name="description" cols="40" rows="5"></textarea></p>

        </fieldset>

        <div align="center"><input type="submit" name="submit" value="Submit" /></div>
        <input type="hidden" name="submitted" value="TRUE" />

    </form>

    <?php
} // End of main conditional.
?>
<?php
include './includes/footer.php';
?>