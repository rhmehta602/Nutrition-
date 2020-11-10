<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
    
    <?php
        session_start();
        $email=$_POST["email"];
        $password=$_POST["password"];

        $message="";
        if(count($_POST)>0) {
            $conn = $db = mysqli_connect('localhost','root','','nutrition') or die('Error connecting to MySQL server.');
            $result = mysqli_query($conn,"SELECT * FROM login WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
            $count  = mysqli_num_rows($result);
            if($count==0) {
                $message = "Invalid Username or Password!";
                header('location: http://127.0.0.1/nutrition/404.php');
            } else {
                $message = "You are successfully authenticated!";
                header('location: http://127.0.0.1/nutrition/personalInfo.php');
            }
        }
    ?>


</body>
</html>
