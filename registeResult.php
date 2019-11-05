<?php
require_once 'mysql_connection.php';
include './includes/header.php';
?>  

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
            <form action="login.php" method="post">
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