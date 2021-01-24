<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/dark-mode.css">

    <title>getComputer</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <a class="navbar-brand" href="../index.html">Computer-Part Picker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Home </a> <!-- FIX THIS FUCKING DROPDWN -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../index.html"> Home </a>
                        <a class="dropdown-item" href="articles.html"> Articles </a>
                        <a class="dropdown-item" href="FAQ.html"> FAQ </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="aboutContact.html"> Contact/About us </a>
                    </div>
                </li>
                <a href="../html/getcomputer.php"><button class="btn btn-outline-primary py-2" type="button">Get computer</button></a>
                <li class="nav-item">
                    <a class="nav-link" href="../html/aboutContact.html">About</a>
                </li>
                <li class="nav-item mt-2 ml-2">
                    <div class="custom-control custom-switch d-flex">
                        <input type="checkbox" class="custom-control-input" id="darkSwitch"/>
                        <label class="custom-control-label text-light" for="darkSwitch">Dark Mode</label>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- main page -->
    <div class="container-fluid bg-light">              
        <h3 class="text-center header pt-5">Get computer</h3>

        <div class="container-fluid col-md-8 mb-3" id="divMiddleGetComputer">
            <div class="container card mt-4">
                <div class="card-body">
                    <form class="my-5 mx-2" method="post">
                        <!-- Budget input box -->
                        <div class="form-group row d-flex justify-content-center mb-4">
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="inputBudget" name="budget" placeholder="Budget" required>
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            Keep in mind to insert the budget that excludes the money used for keyboard, mouse, monitor/screen. This is only for the computer itself.
                        </div>

                        <div class="col-md-8 mx-4">
                        <h5>Preferences</h5>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAMDGPU" checked>
                                    <label class="form-check-label" for="checkAMDGPU">Include AMD GPU</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="checkNVGPU" checked>
                                    <label class="form-check-label" for="checkNVGPU">Include Nvidia GPU</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkInCPU" checked>
                                    <label class="form-check-label" for="checkInCPU">Include Intel CPU</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAMDCPU" checked>
                                    <label class="form-check-label" for="checkAMDCPU">Include AMD CPU</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <fieldset class="form-group">
                            <h5>Main use</h5>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gaming" id="checkboxGaming" value="option1" checked>
                                        <label class="form-check-label" for="checkboxGaming">Gaming</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="officeHome" id="checkboxOfficeHome" value="option2">
                                        <label class="form-check-label" for="checkboxOfficeHome">Office / Home computer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="workRender" id="checkboxWorkRender" value="option3">
                                        <label class="form-check-label" for="checkboxWorkRender">Working/Rendering</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        </div>

                        <!-- button -->
                        <div class="d-flex justify-content-center mt-5">
                            <input class="mt-1 btn btn-primary m-size d-flex justify-content-center px-5 py-2" type="submit" name="Submit" value="Get your computer">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
        <?php
            if(isset($_POST['Submit'])){
                if($_POST['budget'] >=7200){
                    $servername = "46.59.18.164:3306"; #46.59.18.164 #localhost
                    $username = "ruski";
                    $password = "hund";
                    $dbname = "computerparts";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    else{
                        echo "database connected! :D <br>";
                    }

                    // gets data from database
                    // gets user inputs for budget and gaming

                    $budget = $_POST['budget']; //minimum 7200

                    $purpose = 'gaming';

                    //sets the performance range based on budget
                    $performance = '';
                    if($budget <= 10000){
                        $performance = 'low';
                    }
                    else if($budget > 10000 && $budget < 15000){
                        $performance = 'mid';
                    }
                    else if($budget >= 15000){
                        $performance = 'high';
                    }

                    //dont forget to take away money for a case (pre set standard case set by us)

                    //percentage of budgets depend on what performance the computer is. Different priorities.
                    if($performance == 'low'){

                        $cpuBudget = $budget * 0.355;
                        $gpuBudget = $budget * 0.206;
                        $moboBudget = $budget * 0.15; //fix later
                        $psuBudget = $budget * 0.1; //fix later
                        $RAMBudget = $budget * 0.1; //fix later
                        $storageBudget = $budget * 0.15; //fix later

                    }
                    else if($performance == 'mid'){

                        $cpuBudget = $budget * 0.30;
                        $gpuBudget = $budget * 0.324;
                        $moboBudget = $budget * 0.15; //fix later
                        $psuBudget = $budget * 0.1; //fix later
                        $RAMBudget = $budget * 0.1; //fix later
                        $storageBudget = $budget * 0.15; //fix later

                    }
                    else if($performance == 'high'){

                        $cpuBudget = $budget * 0.20;
                        $gpuBudget = $budget * 0.35;
                        $moboBudget = $budget * 0.15; //fix later
                        $psuBudget = $budget * 0.1; //fix later
                        $RAMBudget = $budget * 0.1; //fix later
                        $storageBudget = $budget * 0.15; //fix later

                    }
                    else{
                        echo "ERROR with setting budget for each part!";
                    }

                    echo "
                    <div class='alert alert-success' role='alert'>
                        Budget: ".$budget." Purpose: ".$purpose." Performance: ".$performance." <br>
                    </div>
                    ";

                    echo "
                        <div class='row py-3'>
                    ";

                    //CPU
                    getCPU($conn, $cpuBudget, $purpose, $performance);

                    //GPU
                    getGPU($conn, $gpuBudget, $purpose, $performance);

                    //mobo
                    getMOBO($conn, $moboBudget, $purpose, $performance);

                    //Storage
                    getStorage($conn, $storageBudget, $purpose, $performance);

                    //PSU
                    getPSU($conn, $psuBudget, $purpose, $performance);

                    //RAM
                    getRAM($conn, $RAMBudget, $purpose, $performance);

                    echo "
                        </div>
                    ";
                }

                else{
                    echo '<script>alert("Minimum for budget is 7200kr")</script>';
                }
            }

            function getCPU($conn, $cpuBudget, $purpose, $performance){

                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'high' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{}
        
                $fittingAmount = 0; //the amount of parts that fit the requirements
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $cpuBudget){
                            $fittingAmount++;           
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
        
                //______________________________________________________________
        
                if($performance == 'low'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand_and_modifier, name, price, link FROM CPU WHERE performance = 'high' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{ }
        
                if (mysqli_num_rows($result) > 0) {
        
                    //get random part of the fitting ones
                    $rand = mt_rand(1, $fittingAmount);
                    $i = 0;
        
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $cpuBudget){
                            $i++;
                            if($i == $rand){
                                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>CPU: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>". $row['manufacturer']. " " . $row['brand_and_modifier']. " " . $row['name']."</h2>
                                                </a>
                                                <h5>". $row['price']. "kr</h5>
                                            </div>
                                        </div>
                                    </div>";
                            }
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
            }
        
            function getGPU($conn, $gpuBudget, $purpose, $performance){
        
                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'high' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                $fittingAmount = 0; //the amount of parts that fit the requirements
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        
                        if($row["price"] <= $gpuBudget){
                            $fittingAmount++;           
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
        
                //nästa del
        
                if($performance == 'low'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand, modifier, name, price, link FROM GPU WHERE performance = 'high' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{ }
        
                if (mysqli_num_rows($result) > 0) {
        
                    //gets the random part out of the fitted ones
                    $rand = mt_rand(1, $fittingAmount);
                    $i = 0;
        
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $gpuBudget){
                            $i++;
                            if($i == $rand){

                                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>GPU: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>".$row['manufacturer']. " " .$row['brand']. " " . $row['modifier']. " " . $row['name']."</h2>
                                                </a>
                                                <h5>". $row['price']. "kr</h5>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
                echo "<br><hr><br>";
            }
        
            function getMOBO($conn, $moboBudget, $purpose, $performance){
                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>Motherboard: </div>
                                            <div class='card-body'>
                                                <a href=''>
                                                    <h2>namn och skit</h2>
                                                </a>
                                                <h5>xxxx kr</h5>
                                            </div>
                                        </div>
                                    </div>";
            }
        
            function getStorage($conn, $storageBudget, $purpose, $performance){
                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>Storage: </div>
                                            <div class='card-body'>
                                                <a href=''>
                                                    <h2>namn och skit</h2>
                                                </a>
                                                <h5>xxxx kr</h5>
                                            </div>
                                        </div>
                                    </div>";
            }
        
            function getPSU($conn, $psuBudget, $purpose, $performance){
                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>PSU: </div>
                                            <div class='card-body'>
                                                <a href=''>
                                                    <h2>namn och skit</h2>
                                                </a>
                                                <h5>xxxx kr</h5>
                                            </div>
                                        </div>
                                    </div>";
            }
            
            function getRAM($conn, $RAMBudget, $purpose, $performance){
                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 13rem;'>
                                            <div class='card-header'>RAM: </div>
                                            <div class='card-body'>
                                                <a href=''>
                                                    <h2>namn och skit</h2>
                                                </a>
                                                <h5>xxxx kr</h5>
                                            </div>
                                        </div>
                                    </div>";
            }
        ?>

    </div>
    <!-- footer -->
    <div class="text-center bg-primary text-white py-1">
        <p class="my-3 py-1"> NTI Gymnasiet Södertörn | Gymnasiearbete | Saga Liljenroth Dickman & Ruslan Musaev | 2020 </p>
    </div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dark-mode-switch.min.js"></script>
    
</body>
</html>