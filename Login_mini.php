
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Login_mini.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Login</title>
  </head>
  <body class='back'>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">NutriFit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">TrainFit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blogs</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>  
    <div class="container" id="form" style="width:40%">
          <h1 style='color: burlywood; text-align:center'>Account Credentials</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Full Name" required>  
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required>  
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-dark btn-block">Submit</button>
            </div>
        </form>
        <?php
        $email = $pass = ""; 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
           
            $email=$_POST["Email"];
            $pass=$_POST["Password"];
            $db = mysqli_connect('localhost','root','','nutrition') or 
            die('Error connecting to MySQL server.');
            
            $row = "SELECT * FROM signin WHERE email= '$email'";
            $result = mysqli_query($db,$row); //order executes
            if (mysqli_num_rows($result) == 0) {
              echo "<p>No such user found!</p>";
              mysqli_close($db);
              header("location:http://localhost/minip/Login_mini.php?message=failure"); //signup page ridirection
            } 
            else{
                $row1 = mysqli_fetch_array($result);
                if($row1['password'] == $pass){
                mysqli_close($db);
                header("location:http://localhost/minip/Training_Programmes.html?message=success");
                }
              }
            }      
            ?>
        <a href="forgotpassword.php"><p>Forgot Password?</p></a>
        <a href="">GO Back</a>
    </div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

