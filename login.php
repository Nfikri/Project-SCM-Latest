<?php
require_once 'mysql_connection.php';
include './includes/header.php';
?>  


<div align="center" style="width: 50%;margin: 0 auto;text-align: left;border: 1px solid black;padding-left: 200px;">
    <h1><b>Login Page</b></h1>
    <br/>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <p>Username: <input type="text" id="username" name="user_name" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>"</p>
            <p>Password: <input type="password" id="password" name="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">&nbsp;&nbsp;<input type="checkbox" onclick="myFunction()"> Show Password</p>

            <script>
                function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <input type="submit" value="Submit" name="submit" style="width: 80px;"/>&nbsp;&nbsp;
            <input type="reset" value="Reset" name="Reset" style="width: 80px;" /><br/><br/>

            <p class="remember_me">
                <label>

                    <input type="checkbox" name="remember_me" id="remember_me">
                    Remember me 
                </label>
            </p>

            <a href="register.php">Not yet register?Click here...</a>
        </fieldset>

    </form>
</div>



<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['user_name']);
    $password = trim($_POST['password1']);


    $sql = "select * from tbluser_account where username = '" . $username . "'";
    $rs = mysqli_query($dbc, $sql);
    $numRows = mysqli_num_rows($rs);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($rs);
        $rememberme = $_POST['remember_me'];
        if (!empty($_POST["remember"])) {
            setcookie("username", $_POST["username"], time() + 3600);
            setcookie("password", $_POST["password"], time() + 3600);
            echo "Cookies Set Successfuly";
        } else {
            setcookie("username", "");
            setcookie("password", "");
            echo "Cookies Not Set";
        }

        if ((password_verify($password, $row['passwordhash']))) {
            $_SESSION['username'] = $username;

            if ($row['role'] == "admin") {
                header('location: adminindex.php');
            } else {
                header('location: index.php');
            }

//        } else if ((password_verify($password, $row['passwordhash'])) && $row['role'] = 'admin') {
//            $_SESSION['username'] = $username;
//            header("Location: AdminAccount.php");
//            
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "No User found";
    }
}
if (isset($_GET['action']) and $_GET['action'] == 'logout') {
    if (!isset($_SESSION)) {
        session_start();
    };
    unset($_SESSION['username']);
    header('Location:login.php');
    exit();
}
?>

<?php
include './includes/footer.php';
?>