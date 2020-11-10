<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="personalInfo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style>
        .error {color: #FF0001;}
    </style>
    <title>Personal Details</title>

</head>
<body>
    <?php
    $height = $weight = $tweight = $age = $condition = $calories = $workout = "";
    $heightErr = $weightErr = $tweightErr = $ageErr = $conditionErr = $caloriesErr = $workoutErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["height"])) {
            $heightErr = "height is required";
        } 
        else{
            $height = input_data($_POST["height"]);
            if(!preg_match('/^[1-9]\d*$/', $height)){
                $heightErr = "It should be a number";
            }
        }


        if (empty($_POST["weight"])) {
            $weightErr = "weight is required";
        } 
        else{
            $weight = input_data($_POST["weight"]);
            if(!preg_match('/^[1-9]\d*$/', $weight)){
                $weightErr = "It should be a number";
            }
        }


        if (empty($_POST["tweight"])) {
            $tweightErr = "Target Weight is required";
        } 
        else{
            $tweight = input_data($_POST["tweight"]);
            if(!preg_match('/^[1-9]\d*$/', $tweight)){
                $tweightErr = "It should be a number";
            }
        }


        if (empty($_POST["calories"])) {
            $caloriesErr = "calories is required";
        } 
        else{
            $calories = input_data($_POST["calories"]);
            if(!preg_match('/^[1-9]\d*$/', $calories)){
                $caloriesErr = "It should be a number";
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "age is required";
        } 
        else{
            $age = input_data($_POST["age"]);
            if(!preg_match('/^[1-9]\d*$/', $age)){
                $ageErr = "It should be a number";
            }
        }

        if (empty($_POST["condition"])) {
            $conditionErr = "condition is required";
        } 
        else{
            $condition = input_data($_POST["condition"]);
            if(!preg_match("/^[a-zA-Z ]*$/", $condition)){
                $conditionErr = "It should be alphabets";
            }
        }

        if (empty($_POST["workout"])) {
            $workoutErr = "workout is required";
        } 
        else{
            $workout = input_data($_POST["workout"]);
            if(!preg_match('/^[1-9]\d*$/', $workout)){
                $workoutErr = "It should be a number";
            }
        }
    }
    function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
      } 
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">NutriFit</a>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TrainFit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blogs</a>
                </li>
            </ul>
    </nav>
<div class="container" id="form" style="width:90%">
    <h1>Personal Information</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="height">Height</label>
              <input type="text" class="form-control" id="height" name="height">
              <span class="error">* <?php echo $heightErr; ?> </span> 
            </div>
            <div class="form-group col-md-6">
              <label for="unit">Unit</label>
              <select id="inputState" class="form-control">
                  <option selected>Centimeters</option>   
                  <option>Metres</option>
                </select>
            </div>

        </div>
        <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="in years">
                <span class="error">* <?php echo $ageErr; ?> </span> 
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="weight">Current Weight</label>
              <input type="text" class="form-control" id="weight" name="weight">
              <span class="error">* <?php echo $weightErr; ?> </span> 
            </div>
            <div class="form-group col-md-3">
              <label for="unit">Unit</label>
              <select id="inputState" class="form-control">
                  <option selected>Kilograms</option>
                  <option>Pounds</option>
                </select>
            </div>
          <div class="form-group col-md-3">
            <label for="tWeight">Target Weight</label>
            <input type="text" class="form-control" id="tWeight" name="tweight">
            <span class="error">* <?php echo $tweightErr; ?> </span> 
          </div>
          <div class="form-group col-md-3">
            <label for="unit">Unit</label>
            <select id="inputState" class="form-control">
                <option selected>Kilograms</option>   
                <option>Pounds</option>
              </select>
          </div>
        </div>


        <div class="form-group">
          <label for="condition">Medical Conditions</label>
          <input type="text" class="form-control" id="conditions" placeholder="allergies/ailments if any" name="condition">
          <span class="error">* <?php echo $conditionErr; ?> </span>   
        </div>


            <div class="form-group">
                <label for="calories">Daily calorie consumption</label>
                <input type="text" class="form-control" id="calories" placeholder="in kCal" name="calories">
                <span class="error">* <?php echo $caloriesErr; ?> </span> 
            </div>
            <div class="form-group">
                <label for="workout">Daily Workout</label>
                <input type="text" class="form-control" id="workout" placeholder="in hours" name="workout">
                <span class="error">* <?php echo $workoutErr; ?> </span> 
            </div>

        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <button type="submit" class="btn btn-outline-light btn-lg">Submit</button>
      </form>

    
      </div>
</body>
</html>
