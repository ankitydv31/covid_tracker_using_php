<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="codes/header.css">
    <title>Document</title>
</head>
<body>

    <header class="MainHeader">
        <h1 class="MainHeading"> 
            COVID TRACKER
        </h1>
        <nav class="navigator">
            <ul>
                <li class="navigations">
                    <a href="index.html">HOME</a>
                 </li>
                <li class="navigations">
                   <a href="patients_widget.html">PATIENT DETAILS</a>
                </li>
                <li class="navigations">
                    <a href="admin.html"> ADMIN</a>
                </li>
                <li class="navigations">
                    <a href="patients_symptoms.php"> PREDICTION METER</a>
                </li>
                <li class="navigations">
                    <a href="State_analysis.php">STATE ANALYSIS</a>
                </li>
            </ul>
        </nav>
    </header>
    
</body>
</html>';
echo "<h2>";
$con=mysqli_connect("localhost","root","1234");
mysqli_select_db($con,"project");
$name=$_POST["id"];
$password=$_POST["password"];
try{
$query="select * from admin where username='".$name."'and password='".$password."'";
mysqli_query($con,$query);
if(mysqli_affected_rows($con)){
    echo "you have loged in successfully <a href='symptoms_widget.html'><button value=''>click here</button></a> to jump to options";
}
else{
echo "invalid username or password";
}
}catch(Exception $e){
    echo "unable to connect with the databse please try again";
}
mysqli_close($con);
echo "<h2>";
?>