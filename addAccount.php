<?php
require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>  

<h1>User Registration Page</h1>
<br/>
<form action="" method="post">
    <fieldset>
        <p>Enter email as your username: <input type="text" id="username" name="user_name" value="<?php if (isset($_POST['user_name']))echo $_POST['user_name']; ?>"</p>
        <p>Enter first name: <input type="text" id="f_name" name="f_name" value="<?php if (isset($_POST['f_name']))echo $_POST['f_name']; ?>"></p>
        <p>Enter last name: <input type="text" id="l_name" name="l_name" value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>"></p>
        <p>Enter address: <input type="text" id="address" name="address1" value="<?php if (isset($_POST['address1']))echo $_POST['address1']; ?>"></p>
        <p>Enter phone number: <input type="text" id="phone" name="phoneNum" value="<?php if (isset($_POST['phoneNum']))echo $_POST['phoneNum']; ?>"></p>
        <p>Enter preferred password: <input type="text" id="password" name="password1" value="<?php if (isset($_POST['password1']))echo $_POST['password1']; ?>"></p>
        <input type="submit" value="Submit" name="submitted" style=""/>&nbsp;&nbsp;
        <input type="reset" value="Reset" name="Reset" />
    </fieldset>
</form>

<?php

//Check if the form has been submitted.
if (isset($_POST['submitted'])) {

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

    if (empty($_POST['password1'])) {
        $errors[] = 'You forgot to enter password.';
    } else {
        $password = $_POST['password1'];
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }


    if (empty($errors)) {

        $query = "SELECT username,firstName,lastName,address,phoneNume, passwordhash, role, enabled FROM tbluser_account where username='$username'";
        $result = mysqli_query($dbc, $query);

        if (mysqli_num_rows($result) == 0) {
            //Make the query.
            $query = "INSERT INTO tbluser_account(username,firstName,lastName,address,phoneNume, passwordhash, role, enabled) VALUES ('$username','$f', '$l', '$address', '$phone' , '$hashed_password', 'user','1')";
            $result = mysqli_query($dbc, $query); //Run the query

            if ($result) { //if it ran OK.
                //Send an email if desired.
                //Print a message.
                echo '<h1 id="mainhead">Thank you!</h1> <p>You are now registered.</p><br/>';
                echo '<div style="text-align: left;">
            <form action="AdminAccount.php" method="post">
             <input id="buttonSubmit" type="submit" value="Back" name="exitButton">
            </form>
                </div>';
                exit();
            }
        } else { //Already registered.
            echo'<h1 id="mainhead">Error!</h1>
        <p class="error"> The email address has already been registered.</p>';
        }
    } else { //Report the errors.
        echo '<h1 id="mainhead">Error!</h1><p class="error"> The following error(s) occured: <br/>';
        foreach ($errors as $msg) { //print each error
            echo"-$msg<br/>\n";
        }
        echo'</p><p>Please try again.<p><p><br/></p>';
    }//End of if (empty($errors)) IF.
}//End of the main Submit conditional.
?>


<?php
include './includes/footer.php';
?>
   