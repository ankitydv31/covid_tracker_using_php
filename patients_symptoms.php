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
    </header>

    <section class="mainbody">
        <div class="formplace" style="width:20%;">
            <div class="pngimage">
                <img src="codes/149071.png" alt="">
            </div>
            <div class="formclass">
                <form action="predictormodel.php" method="post">
                    <div class="formsection">
                        <div class="elements">
                            PID: <br><input type="text" name="pid" id="">
                        </div>
                    </div>
                    <div class="formsection">SELECT ATMOST 4 SYMPTOMPS</div>';
                    
                    $con=mysqli_connect("localhost","root","1234");
                    mysqli_select_db($con,"project");
                    $query="select symptomps from symptompsdetail";
                    $resultset=mysqli_query($con,$query);
                    while($result=mysqli_fetch_assoc($resultset)){
                    echo '<div class="formsection">
                        <div class="elements" style="padding:0;">
                           <input type="checkbox" name="'.$result["symptomps"].'" id="">'.$result["symptomps"].' 
                        </div>
                    </div>';
                    }
                    mysqli_close($con);
                    echo '<div class="formsection">
                        <div class="elements">
                           <input type="submit" value="PREDECTION">
                            <input type="reset" value="RESET">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

</body>
</html>';
?>