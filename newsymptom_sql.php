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
$reg=$_POST["sreg"];
$name=$_POST["sname"];  
$organ1=$_POST["sorgan1"];
$organ2=$_POST["sorgan2"];
$organ3=$_POST["sorgan3"];
$organ4=$_POST["sorgan4"];

if(
preg_match("^[\d]+^",$reg)&&
preg_match("^[A-Z a-z]*^",$name)&&
preg_match("^[A-Z a-z]*^",$organ1)&&
preg_match("^[A-Z a-z]*^",$organ2)&&
preg_match("^[A-Z a-z]*^",$organ3)&&
preg_match("^[A-Z a-z]*^",$organ4)
){
try{
$query="insert into symptompsdetail (reg,symptomps,organ1,organ2,organ3,organ4) values(".$reg.",'".$name."','".$organ1."','".$organ2."','".$organ3."','".$organ4."')";
$con->query($query);
    echo " new symptom is added successfully <br>";
}catch(Exception $e){
    echo "unable to create your account please check details carefully and try again";
}
}
else{
    echo "please fill the details properly";
}
mysqli_close($con);
?>