<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Home </a>
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
                        <div id="divAlertMinimum"></div>
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
                                        <input class="form-check-input" type="radio" name="purpose" id="checkboxGaming" value="gaming" checked>
                                        <label class="form-check-label" for="checkboxGaming">Gaming</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="purpose" id="checkboxOfficeHome" value="office">
                                        <label class="form-check-label" for="checkboxOfficeHome">Office / Home computer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="purpose" id="checkboxWorkRender" value="work">
                                        <label class="form-check-label" for="checkboxWorkRender">Working/Rendering</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        </div>

                        <!-- button -->
                        <div class="d-flex justify-content-center mt-5">
                            <input class="mt-1 btn btn-primary d-flex justify-content-center px-5 py-2" id="buttonGetComputer" type="submit" name="Submit" value="Get your computer">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST['Submit'])){
                if($_POST['budget'] >= 7700){
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
                        //echo "<p class='text-center'>Connections to databse is successful</p><br>"; 
                    }

                    // gets data from database
                    // gets user inputs for budget and gaming

                    $budget = $_POST['budget']; //minimum 7700
                    $totalBudget = $budget;

                    $purpose = 'gaming';

                    //sets the performance range based on budget
                    $performance = '';
                    if($budget <= 10000){
                        $performance = 'low';

                        $budget = $budget - 449;
                    }
                    else if($budget > 10000 && $budget < 16000){
                        $performance = 'mid';
                        $budget = $budget - 549;
                    }
                    else if($budget >= 16000){ //45389
                        $performance = 'high';
                        $budget = $budget - 1688;
                    }

                    //dont forget to take away money for a case (pre set standard case set by us)

                    //percentage of budgets depend on what performance the computer is. Different priorities.
                    if($performance == 'low'){ //total: 100%

                        $cpuBudget = $budget * 0.355; //35,5%
                        $gpuBudget = $budget * 0.206; //20,6%
                        $moboBudget = $budget * 0.143; //14,3%
                        $psuBudget = $budget * 0.162; //16,2%
                        $RAMBudget = $budget * 0.074; //7,4%
                        $storageBudget = $budget * 0.06; //6%

                    }
                    else if($performance == 'mid'){ //total: 94,6%

                        $cpuBudget = $budget * 0.281; //28,1%
                        $gpuBudget = $budget * 0.304; //30,4%
                        $moboBudget = $budget * 0.12; //12%
                        $psuBudget = $budget * 0.137; //13,7%
                        $RAMBudget = $budget * 0.05; //5%
                        $storageBudget = $budget * 0.054; //5,4%

                    }
                    else if($performance == 'high'){ //total: 100%

                        $cpuBudget = $budget * 0.20; //20%
                        $gpuBudget = $budget * 0.35; //35%
                        $moboBudget = $budget * 0.14; //14%
                        $psuBudget = $budget * 0.14; //14%
                        $RAMBudget = $budget * 0.075; //7,5%
                        $storageBudget = $budget * 0.095; //9,5%

                    }
                    else{
                        echo "ERROR with setting budget for each part!";
                    }

                    echo "
                    <div class='alert alert-success text-center' role='alert'>
                        <h2>Your current budget is: ".$totalBudget." kr</h2>".
                    "</div>";

                    echo "
                        <div class='row py-3 mx-auto' style='width: 75rem;' id='resultano'>
                    ";

                    //Case
                    getCase($performance);

                    //CPU
                    $cpuSocket = getCPU($conn, $cpuBudget, $purpose, $performance);

                    //GPU
                    getGPU($conn, $gpuBudget, $purpose, $performance);

                    //mobo
                    getMOBO($conn, $moboBudget, $purpose, $performance, $cpuSocket);

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
                    //minimum 7700 - FIX FFS

                    echo "<script> 
                            document.getElementById('divAlertMinimum').innerHTML += '<div class='alert alert-warning text-center' role='alert'> Please put in a budget over 7700kr </div>'; 
                        </script>"
                    ;
                    echo "<div class='alert alert-warning text-center' role='alert'> Please put in a budget over 7700kr </div>";
                }
            }

            function getCase($performance){
                $caseCost = 0;
                $link = "";
                $name = "";
                $extraInfo = "";

                if ($performance == 'low'){
                    $caseCost = 449;
                    $link = "https://www.komplett.se/product/1014312/datorutrustning/datorkomponenter/chassibarebone/midi-tower/deepcool-d-shield-v2";
                    $name = "Deepcool D-Shield V2";
                    $extraInfo = "Middle Tower. mITX, mATX, ATX. Fans: 1x120mm back.";
                }
                else if ($performance == 'mid'){
                    $caseCost = 549;
                    $link = "https://cdon.se/hemelektronik/deepcool-matrexx-55-v3-black-p55309820";
                    $name = "Deepcool Matrexx 55 V3 - Black";
                    $extraInfo = "Middle Tower. E-ATX, ATX, Micro-ATX, Mini-ITX. Tempered Glass";
                }
                else if ($performance == 'high'){
                    $caseCost = 1688;
                    $link = "https://www.komplett.se/product/1132476/datorutrustning/datorkomponenter/chassibarebone/midi-tower/nzxt-h710-vit";
                    $name = "NZXT H710 Vit";
                    $extraInfo = "Middle Tower. ATX, mITX, mATX. Fans: 3x 120mm front, 1x 140mm back. Tempered Glass";
                }

                echo "
                    <div class='col-sm mt-3'>
                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
                            <div class='card-header'>Case: </div>
                            <div class='card-body'>
                                <a href='".$link."'>
                                    <h2>".$name."</h2>
                                    <small class='text-muted'>".$extraInfo."</small>
                                </a>
                                <br>
                                <h5>".$caseCost."kr</h5>
                            </div>
                        </div>
                    </div>
                ";
            }

            function getCPU($conn, $cpuBudget, $purpose, $performance){

                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'high' ";
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
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'low' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'mid' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT manufacturer, brand_and_modifier, socket, name, price, link FROM CPU WHERE performance = 'high' ";
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
                                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
                                            <div class='card-header'>CPU: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>". $row['manufacturer']. " " . $row['brand_and_modifier']. " " . $row['name']."</h2>
                                                </a>
                                                <h5>". $row['price']. "kr</h5>
                                            </div>
                                        </div>
                                    </div>
                                ";
                                return $row['socket'];
                            }
                        }
                    }
                } 
                else {
                    echo "0 results";
                    return "";
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
                        else{
                            // echo "<br> 0 gpu's found.";
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
                                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
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
        
            function getMOBO($conn, $moboBudget, $purpose, $performance, $cpuSocket){

                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                $fittingAmount = 0; //the amount of parts that fit the requirements
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        
                        if($row["price"] <= $moboBudget){
                            $fittingAmount++;           
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
        
                //nästa del
        
                if($performance == 'low'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT which_cpu, company, name, socket, form_factor, chipset, max_ram_speed, max_ram_size, price, performance, link FROM Mobo WHERE socket = '$cpuSocket' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                if (mysqli_num_rows($result) > 0) {
        
                    //gets the random part out of the fitted ones
                    $rand = mt_rand(1, $fittingAmount);
                    $i = 0;
        
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $moboBudget){
                            $i++;
                            if($i == $rand){

                                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
                                            <div class='card-header'>Motherboard: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>".$row['company']. " " .$row['name']."</h2>
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
        
            function getStorage($conn, $storageBudget, $purpose, $performance){
                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size = '250' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size <= '500'";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size BETWEEN '499' AND '1001' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                $fittingAmount = 0; //the amount of parts that fit the requirements
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        
                        if($row["price"] <= $storageBudget){
                            $fittingAmount++;           
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
        
                //nästa del
        
                if($performance == 'low'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size = '250' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size <= '500'";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT name, form_factor, size, price, link FROM Storage WHERE size BETWEEN '499' AND '1001' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                if (mysqli_num_rows($result) > 0) {
        
                    //gets the random part out of the fitted ones
                    $rand = mt_rand(1, $fittingAmount);
                    $i = 0;
        
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $storageBudget){
                            $i++;
                            if($i == $rand){

                                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
                                            <div class='card-header'>SSD: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>".$row['name']. " " .$row['size'].'GB'."</h2>
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
        
            function getPSU($conn, $psuBudget, $purpose, $performance){
                //hämtar från databasen
                if($performance == 'low'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt <= '550' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt BETWEEN '550' AND '650' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt >= '750' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                $fittingAmount = 0; //the amount of parts that fit the requirements
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        
                        if($row["price"] <= $psuBudget){
                            $fittingAmount++;           
                        }
                    }
                } 
                else {
                    echo "0 results";
                }
        
                //nästa del
        
                if($performance == 'low'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt <= '550' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if ($performance == 'mid'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt BETWEEN '550' AND '650' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($performance == 'high'){
                    $sql = "SELECT name, watt, 80plus, modular, price, link FROM PSU WHERE watt >= '750' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
        
                }
        
                if (mysqli_num_rows($result) > 0) {
        
                    //gets the random part out of the fitted ones
                    $rand = mt_rand(1, $fittingAmount);
                    $i = 0;
        
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["price"] <= $psuBudget){
                            $i++;
                            if($i == $rand){

                                echo "
                                    <div class='col-sm mt-3'>
                                        <div class='card shadow' style='width: 20rem; height: 15rem;'>
                                            <div class='card-header'>PSU: </div>
                                            <div class='card-body'>
                                                <a href='".$row['link']."'>
                                                    <h2>".$row['name']. " " .$row['watt'].'W'."</h2>
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
            
            function getRAM($conn, $RAMBudget, $purpose, $performance){
                //hämtar från databasen
                if($RAMBudget >= 529 && $RAMBudget < 749){
                    $sql = "SELECT name, size, speed, modules, price, link FROM RAM WHERE price = '529' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($RAMBudget >= 749 && $RAMBudget < 1667){
                    $sql = "SELECT name, size, speed, modules, price, link FROM RAM WHERE price = '749' ";
                    $result = mysqli_query($conn, $sql);
                }
                else if($RAMBudget >= 1667){
                    $sql = "SELECT name, size, speed, modules, price, link FROM RAM WHERE price = '1667' ";
                    $result = mysqli_query($conn, $sql);
                }
                else{

                }
        
                if (mysqli_num_rows($result) > 0) {
        
                    while($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <div class='col-sm mt-3'>
                                    <div class='card shadow' style='width: 20rem; height: 15rem;'>
                                        <div class='card-header'>RAM: </div>
                                        <div class='card-body'>
                                            <a href='".$row['link']."'>
                                                <h2>".$row['name']. " " .$row['size'].'GB'."</h2>
                                            </a>
                                            <h5>". $row['price']. "kr</h5>
                                        </div>
                                    </div>
                                </div>
                            ";
                    }
                } 
                else {
                    echo "0 results";
                }
                echo "<br><hr><br>";
            }
        ?>

    </div>
    <!--footer -->
    <div class="text-center bg-dark text-white">
        <p class="text-light py-3 m-0"> <a href="https://www.ntigymnasiet.se/sodertorn/" class="text-light" style="text-decoration:none">NTI Gymnasiet Södertörn</a> | Saga Liljenroth Dickman & Ruslan Musaev | 2020 </p>
    </div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    
    <script>
    $(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#resultano").offset().top
    }, 2000);
})
    </script>
</body>
</html>