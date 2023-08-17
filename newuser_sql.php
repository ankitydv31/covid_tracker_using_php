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
$name=$_POST["pname"];
$email=$_POST["pmail"];
$gender=$_POST["gender"];
$age=$_POST["page"];
$house=$_POST["phouse"];
$area=$_POST["parea"];
$city=$_POST["pcity"];
$district=$_POST["pdistrict"];
$state=$_POST["pstate"];
if(
preg_match("^[A-Z]{1}[a-z]*^",$name)&&
preg_match("^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+^",$email)&&
preg_match("^[\d]+^",$age)&&
preg_match("^[\d]+^",$house)&&
preg_match("^[a-z]+^",$area)&&
preg_match("^[a-z]+^",$city)&&
preg_match("^[a-z]+^",$district)&&
preg_match("^[a-z]+^",$state))
{
try{
$query="insert into patientdetail (name,email,gender,age,house_no,area,city,district,state) values('".$name."','".$email."','".$gender."',".$age.",".$house.",'".$area."','".$city."','".$district."','".$state."')";
$con->query($query);
    echo " your account has been created and your register no. is: ".$con->insert_id."<br>
    please remember your ID for prediction reference";
}catch(Exception $e){
    echo "unable to create your account please check details carefully and try again";
}
}
else
{
    echo "please fill the details properly";
}
mysqli_close($con);
?>