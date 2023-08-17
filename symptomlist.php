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
try{
$query="select * from symptompsdetail";
$resultset=mysqli_query($con,$query);
echo "<table border=2px style='margin:auto'><tr><th>REG NO</th><th>NAME</th><th>ORGAN1</th>
<th>ORGAN2</th><th>ORGAN3</th><th>ORGAN4</th></tr>";
while($result = mysqli_fetch_assoc($resultset)){
    echo "<tr><td>".$result["reg"]."</td><td>".$result["symptomps"]."</td><td>".$result["organ1"]."</td><td>".$result["organ2"].
    "</td><td>".$result["organ3"]."</td><td>".$result["organ4"]."</td></tr>";
}
echo "</table>";
}catch(Exception $e){
    echo "unable to connect with database";
}
mysqli_close($con);
echo "</h2>";
?>