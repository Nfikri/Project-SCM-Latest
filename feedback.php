<?php

require_once 'mysql_connection.php';
include './includes/header.php';
?> 
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }


    .container-feedback {
        border-radius: 5px;
        background-color: #f2f2f2;
        border: 1px solid #8b0434;
        padding: 20px;
        width: 50%;
        margin: 0 auto;
    }
</style>
<h3 style="text-align:center;font-weight: bold;color: #8b0434;">Feedback Form</h3>
<br/>
<div class="container-feedback">
    <form action="feedbacksend.php" method="post">
        <label for="fname" >Full Name</label>
        <input type="text" id="fname" name="senderName" placeholder="Your name..">

        <label for="subject">Subject</label>
        <textarea id="subject" name="msg" placeholder="Write something.." style="height:200px"></textarea>

        <input style="background-color: #8b0434;color: white;" type="submit" value="Submit Feedback">
    </form>
</div> 
<?php

include './includes/footer.php';
?>