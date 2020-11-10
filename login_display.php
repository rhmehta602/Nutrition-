<?php
session_start();
$var_value = $_REQUEST['varname'];
$_SESSION['name']=$var_value;
?>
<?php
if(isset($_SESSION['name'])) {
    echo "<h3>Welcome</h3>";
    echo "Sesion Created";
       
}
else{
    echo"Session is not created";
}

?>

<br>
<a href="Next.php"><button>Proceed</button></a>
