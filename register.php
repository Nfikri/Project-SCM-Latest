<?php
require_once 'mysql_connection.php';
include './includes/header.php';
?>  


<h1>User Registration Page</h1>
<br/>
<form action="registeResult.php" method="post">
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
include './includes/footer.php';
?>