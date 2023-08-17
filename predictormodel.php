<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="codes/Header.css">
    <link rel="stylesheet" href="codes/form.css">
</head>
<body>
    <!-- header -->

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
    echo "<h2>";
    $con=mysqli_connect("localhost","root","1234");
    mysqli_select_db($con,"project");
// try{
    $query="select symptomps from symptompsdetail";
    $resultset=mysqli_query($con,$query);
    $symp=array(NULL,NULL,NULL,NULL);
    $i=0;
    while($result=mysqli_fetch_assoc($resultset)){
        if(isset($_POST[$result["symptomps"]])){
            $symp[$i]=$result["symptomps"];
            $i++;
        }
    }
    $id=$_POST["pid"];
    mysqli_query($con,"insert into predictiontable values(now(),'".$id."','".$symp[0]."','".$symp[1]."','".$symp[2]."','".$symp[3]."')");

    mysqli_query($con,"select * from predictiontable");
    $total=mysqli_affected_rows($con);

    mysqli_query($con,"select * from predictiontable where symp1='".$symp[0]."' or symp2='".$symp[0]."'or symp3='".$symp[0]."'or symp4='".$symp[0]."'");
    $countsymp1=mysqli_affected_rows($con);

    mysqli_query($con,"select * from predictiontable where symp1='".$symp[1]."'or symp2='".$symp[1]."'or symp3='".$symp[1]."'or symp4='".$symp[1]."'");
    $countsymp2=mysqli_affected_rows($con);

    mysqli_query($con,"select * from predictiontable where symp1='".$symp[2]."'or symp2='".$symp[2]."'or symp3='".$symp[2]."'or symp4='".$symp[2]."'");
    $countsymp3=mysqli_affected_rows($con);

    mysqli_query($con,"select * from predictiontable where symp1='".$symp[3]."'or symp2='".$symp[3]."'or symp3='".$symp[3]."'or symp4='".$symp[3]."'");
    $countsymp4=mysqli_affected_rows($con);

    $predictionperc=((($countsymp1+$countsymp2+$countsymp3+$countsymp4)/$total)*100)/4;

    $query="";
    if($predictionperc>70){
        echo "Your prediction percentage is $predictionperc% <br>we higly recommend you to see doctor";
        $query="update patientdetail set infectionprec='".$predictionperc."',status='high' where reg=".$id;
    }
    else if($predictionperc>50&&$predictionperc<=70){
        echo "Your prediction percentage is $predictionperc% <br>we recommend you take home remedie";
        $query="update patientdetail set infectionprec='".$predictionperc."',status='mild' where reg=".$id;
    }
    else{
        echo "Your prediction percentage is $predictionperc% <br>you are more likely not infected";
        $query="update patientdetail set infectionprec='".$predictionperc."',status='low' where reg=".$id;
    }
    mysqli_query($con,$query);
// }
// catch(Exception $e){
    echo "the connection is not established properly";
// }
echo "</h2>";
    mysqli_close($con);
?>