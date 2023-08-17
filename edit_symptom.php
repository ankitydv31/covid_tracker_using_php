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

$con=mysqli_connect("localhost","root","1234");
mysqli_select_db($con,"project");
$id=$_POST["id"];
$field=$_POST["field"];
$newvalue=$_POST["value"];
echo "<h2>";
try{
$query="update symptompsdetail set ".$field."='".$newvalue."' where reg=".$id;
$con->query($query);
    echo "your details has been updated";
}catch(Exception $e){
    echo "unable to edit the details please check connectivity and try again";
}
mysqli_close($con);
echo "</h2>";
?>