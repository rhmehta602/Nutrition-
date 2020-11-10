<?php

#Gender input not working
#Database connection
    $fname=$lname=$age=$gender=$email=$password=$username=$city=$country=$zipcode="";
    $fnameErr=$lnameErr=$ageErr=$genderErr=$emailErr=$usernameErr=$passwordErr=$confirmpasswordErr=$cityErr=$countryErr=$zipcodeErr="";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (ctype_alpha($_POST["fname"])) {
            $fname = test_input($_POST["fname"]);
        } else {
            $fnameErr = "*First Name Invalid";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (ctype_alpha($_POST["lname"])) {
            $lname = test_input($_POST["lname"]);
        } else {
            $lnameErr = "*Last Name Invalid";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (is_numeric($_POST["age"])) {
            $age = test_input($_POST["age"]);
            if ($age==0) {
                $ageErr = "*Invalid Input!";
            }
            elseif (strlen($age) >= 100) {
                $ageErr = "*Invalid Input!";
            }
        }
        else{
            $ageErr = "*Invalid Input!";
        }
    }

    // $gender = test_input($_POST["gender"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (ctype_alnum($_POST["username"])) {
            $username = test_input($_POST["username"]);
        } else {
            $usernameErr = "*Username Invalid";
        }
    }

    if(!empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
        if (strlen($_POST["password"]) <= 8) {
            $passwordErr = "*Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "*Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "*Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "*Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["confirmpassword"]!=$password){
            $confirmpasswordErr="*Passwords doesn't match";
        }
    }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (ctype_alpha($_POST["city"])) {
            $city = test_input($_POST["city"]);
        } else {
            $cityErr = "*City Invalid";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (ctype_alpha($_POST["country"])) {
            $country = test_input($_POST["country"]);
        } else {
            $countryErr = "*Country Invalid";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (is_numeric($_POST["zipcode"])) {
            if(strlen((string)$zipcode <= 6)){
                $zipcode = test_input($_POST["zipcode"]);
            }
        } else {
            $zipcodeErr = "*Zipcode Invalid";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
#Store to database
    if ($fnameErr=='' && $lnameErr=='' && $ageErr=='' && $emailErr=='' && $passwordErr=='' && $usernameErr=='' && $confirmpasswordErr=='' && $cityErr=='' && $countryErr=='' && $zipcodeErr==""){
         $db = mysqli_connect('localhost','root','','nutrition') or 
            die('Error connecting to MySQL server.');

        $order = "INSERT INTO signin
                    (fname,lname,age,gender,email,username,password,city,country,zipcode)
                    VALUES
                    ('$fname','$lname','$age','$gender','$email','$username','$password','$city','$country','$zipcode')";

        $result = mysqli_query($db,$order);	//order executes
        if($result){
            echo("<br>Input data is succeed<br>");
        } else{
            echo("<br>Input data is fail<br>");
        }

        mysqli_close($db);
    }
?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="Index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Create Account</title>
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
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
          <ul class="navbar-nav ml-auto">    
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="login.html"><i class="fas fa-user-plus"></i> Sign Up</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
            </ul>
        </div>
      </nav>

    <div class="jumbotron">
        <br><br><br><br>
        <div>
            <h1 class="display-4" >WELCOME TO NUTRIFIT!</h1>
            <p class="lead">Start with a 7-day free trial, cancel any time</p>
            <hr class="my-4">
            <p>-Hundreds of workouts, recipes & meditations.</p>
            <p>-Access to the world's best in health & fitness.</p>
            <p>-No charge until after your 7-day free trial.</p>
        </div>
        
    

      </div>
    
    

    <div class="form"> 
        <h2 class="display-4" style="color: burlywood;">Personal Info</h2>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-row">
                <div class="col">
                <input type="text" class="form-control" placeholder="First name" name="fname" required>
                <span class="error"><?php echo $fnameErr;?></span>
                
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                <span class="error"><?php echo $lnameErr;?></span>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="age" required>
                <span class="error"><?php echo $ageErr;?></span>
            </div>
            <br>
            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0" style="color: burlywood;">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="male" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Male
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="female">
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                    </div>
                    <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="other">
                    <label class="form-check-label" for="gridRadios3">
                        Other
                    </label>
                    </div>
                </div>
                </div>
                <span class="error"><?php echo $genderErr;?></span>
            </fieldset>

            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="-username@gmail.com" name="email" required>
            <small id="emailHelp" class="form-text text-muted">*We'll never share your email with anyone else.</small>
            <span class="error"><?php echo $emailErr;?></span>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="-user1234" name="username" required>
                <small id="emailHelp" class="form-text text-muted">*Username should be unique.</small>
                <span class="error"><?php echo $usernameErr;?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            <small id="emailHelp" class="form-text text-muted">*Atleast 8-10 characters including 1 uppercase,1 special character and 1 number.</small>
            <span class="error"><?php echo $passwordErr;?></span>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Re-Enter Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confirmpassword" required>
                <small id="emailHelp" class="form-text text-muted">*Should match the above entered password.</small>
                <span class="error"><?php echo $confirmpasswordErr;?></span>
            </div>
            <p class="lead" style="color: burlywood;">Location</p>
            <div class="form-row">
                <div class="col-7">
                <input type="text" class="form-control" placeholder="City" name="city">
                <span class="error"><?php echo $cityErr;?></span>
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Country" name="country">
                <span class="error"><?php echo $countryErr;?></span>
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Zip" name="zipcode">
                <span class="error"><?php echo $zipcodeErr;?></span>
                </div>
            </div>

            <br>
            <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">I Agree to the terms and conditions</label>
            </div>

            <div class="but">
            <button type="submit" class="btn btn-dark btn-lg">CREATE MY ACCOUNT</button>
            </div>
            
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>


