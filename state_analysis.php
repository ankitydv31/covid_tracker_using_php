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
mysqli_query($con,$query);
$total=mysqli_affected_rows($con);
echo $total;
$resultstate=mysqli_query($con,"select distinct(state) as state from patientdetail");
echo "<table border=2px style='margin:auto'><tr><th>state</th><th>low status</th><th>mild status</th><th>high status</th><th>total percentage</th></tr>";
while($result = mysqli_fetch_assoc($resultstate)){
    mysqli_query($con,"select * from patientdetail where infectionprec<50 and state='".$result["state"]."'");
    $low=mysqli_affected_rows($con);
    mysqli_query($con,"select * from patientdetail where infectionprec>=50 and infectionprec<70 and state='".$result["state"]."'");
    $mild=mysqli_affected_rows($con);
    mysqli_query($con,"select * from patientdetail where infectionprec>=70 and state='".$result["state"]."'");
    $high=mysqli_affected_rows($con);
    echo "<tr><td>".$result["state"]."</td><td>".$low."</td><td>".$mild."</td><td>".$high."</td><td>".((($low+$mild+$high)/$total)*100)."</td></tr>";
}
echo "</table>";
}catch(Exception $e){
    echo "unable to connect with database";
}
mysqli_close($con);
echo "</body>
</html>;"
?>