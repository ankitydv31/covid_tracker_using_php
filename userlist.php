<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="codes/header.css">
    <link rel="stylesheet" href="codes/table.css">
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
    </header>';

$con=mysqli_connect("localhost","root","1234");
mysqli_select_db($con,"project");
try{
$query="select * from patientdetail";
$resultset=mysqli_query($con,$query);
echo "<table border=2px style='margin:auto'><tr><th>REG NO</th><th>NAME</th><th>EMAIL</th><th>GENDER</th>
<th>AGE</th><th>HOUSE NO</th><th>AREA</th><th>CITY</th><th>DISTRICT</th><th>STATE</th>
<th>STATUS</th><th>INFECTION %</th></tr>";
while($result = mysqli_fetch_assoc($resultset)){
    echo "<tr><td>".$result["reg"]."</td><td>".$result["name"]."</td><td>".$result["email"]."</td><td>".$result["gender"].
    "</td><td>".$result["age"]."</td><td>".$result["house_no"]."</td><td>".$result["area"]."</td><td>".$result["city"].
    "</td><td>".$result["district"]."</td><td>".$result["state"]."</td><td>".$result["status"]."</td><td>".$result["infectionprec"]."</td></tr>";
}
echo "</table>";
}catch(Exception $e){
    echo "unable to connect with database";
}
mysqli_close($con);
echo "</h2>";
echo "</body>
</html>;"
?>