<?php

require_once 'mysql_connection.php';
include './includes/adminheader.php';
?>   

<?php

$page_title = 'View Account';


echo '<h1 id="mainhead">View Account</h1>';


//Make the query

$query = "SELECT * FROM tbluser_account ORDER BY username ASC";
$result = mysqli_query($dbc, $query);

$num = mysqli_num_rows($result);

if ($num > 0) {
    echo"<p>There are currently $num registered users.</p>\n";

    //table headers
    echo'<table align="center" cellspacing="0" cellpadding="5"> <tr><td align="left"><b>Edit</b></td><td align="left"><b>Delete</b></td><td align="left"><b>Username</b></td><td align="left"><b>First name</b></td><td align="left"><b>Last name</b></td><td align="left"><b>Phone Number</b></td><td align="left"><b>Address</b></td><td align="left"><b>Role</b></td><td align="left"><b>Status</b></td></tr>';

    //fetch and print all records

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td align="left"><a href="editAccount.php?id=' . $row['username'] . '">Edit</a></td><td align="left"><a href="deleteAccount.php?id=' . $row['username'] . '">Delete</a></td><td align="left">' . $row['username'] . '</td><td align="left">' . $row['firstName'] . '</td><td align="left">' . $row['lastName'] . '</td><td align="left">' . $row['phoneNume'] . '</td><td align="left">' . $row['address'] . '</td><td align="left">' . $row['role'] . '</td><td align="left">' . $row['enabled'] . '</td></tr>';
    }
    echo '</table>';

    mysqli_free_result($result);
} else {
    echo '<p class="error">There are currently no registered product.</p>';
}
mysqli_close($dbc);
?>

<form action="addAccount.php">
   <br/><input type="submit" value="Add New Account" name="addNewAccount" />
</form>

<?php

include './includes/footer.php';
?>