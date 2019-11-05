<?php
require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>  
<?php
if (isset($_POST['submitted'])) { // Check if the form has been submitted.
    $errors = array(); //initialize error array.
    //
    //Check for a first name.
    if (empty($_POST ['user_name'])) {
        $errors[] = "You forgot to enter your  username.";
    } else {
        $username = $_POST['user_name'];
    }

    if (empty($_POST ['f_name'])) {
        $errors[] = "You forgot to enter your first name.";
    } else {
        $f = $_POST['f_name'];
    }

    //Check for a last name.

    if (empty($_POST ['l_name'])) {
        $errors[] = "You forgot to enter your last name.";
    } else {
        $l = $_POST['l_name'];
    }

    //Check for an email address

    if (empty($_POST['address1'])) {
        $errors[] = 'You forgot to enter your address.';
    } else {
        $address = $_POST['address1'];
    }

    if (empty($_POST['phoneNum'])) {
        $errors[] = 'You forgot to enter your phone number.';
    } else {
        $phone = $_POST['phoneNum'];
    }
    if (empty($_POST['role'])) {
        $errors[] = 'You forgot to enter your phone number.';
    } else {
        $role = $_POST['role'];
    }

    if (empty($_POST['enabled'])) {
        $errors[] = 'You forgot to enter your phone number.';
    } else {
        $enabled = $_POST['enabled'];
    }
    // confirm that the 'id' variable has been set
    if (isset($_GET['id'])) {
// get the 'id' variable from the URL
        $id = $_GET['id'];
        $query = "UPDATE tbluser_account SET username='$username',firstName='$f',lastName='$l', address='$address', phoneNume='$phone', role='$role', enabled='$enabled' WHERE username='$id'";
        if ($result = mysqli_query($dbc, $query)) { // Worked.
            echo '<p>The account has been updated.</p>';
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

        <fieldset><legend>Fill out the form to edit the account to the catalog:</legend>

            <p>Enter email as your username: <input type="text" id="username" name="user_name" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>"</p>
            <p>Enter first name: <input type="text" id="f_name" name="f_name" value="<?php if (isset($_POST['f_name'])) echo $_POST['f_name']; ?>"></p>
            <p>Enter last name: <input type="text" id="l_name" name="l_name" value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>"></p>
            <p>Enter address: <input type="text" id="address" name="address1" value="<?php if (isset($_POST['address1'])) echo $_POST['address1']; ?>"></p>
            <p>Enter phone number: <input type="text" id="phone" name="phoneNum" value="<?php if (isset($_POST['phoneNum'])) echo $_POST['phoneNum']; ?>"></p>
            <p>Enter role: <input type="text" id="role" name="role" value="<?php if (isset($_POST['role'])) echo $_POST['role']; ?>"></p>
            <p>Enter status: <input type="text" id="enabled" name="enabled" value="<?php if (isset($_POST['enabled'])) echo $_POST['enabled']; ?>"></p>

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