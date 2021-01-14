<?php 
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

    $budget = 17000; //minimum 7200

    $purpose = 'gaming';

    //sets the performance range based on budget
    $performance = '';
    if($budget <= 10000){
        $performance = 'low';
        echo "low";
    }
    else if($budget > 10000 && $budget < 15000){
        $performance = 'mid';
        echo "mid";
    }
    else if($budget >= 15000){
        $performance = 'high';
        echo "high";
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

    //CPU
    getCPU($conn, $cpuBudget, $purpose, $performance);

    //GPU
    getGPU($conn, $gpuBudget, $purpose, $performance);




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
        else{

        }

        $fittingAmount = 0; //the amount of parts that fit the requirements
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                if($row["price"] <= $cpuBudget){
                    echo "<h4 style='background-color: lightblue;'> Fitting: ". $row["manufacturer"]. " " . $row["brand_and_modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4><br>";

                    $fittingAmount++;           }
                else{
                    echo "<h4 style='background-color: red;'> Fitting: ". $row["manufacturer"]. " " . $row["brand_and_modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4><br>";
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
        else{

        }

        if (mysqli_num_rows($result) > 0) {

            //själv checking/felsökning
            echo "Fitting amount: ". $fittingAmount;
            $rand = mt_rand(1, $fittingAmount);
            echo "<br>Random number: ". $rand;

            //get the random part
            $i = 0;

            while($row = mysqli_fetch_assoc($result)) {
                if($row["price"] <= $cpuBudget){
                    $i++;
                    if($i == $rand){
                        echo "<h4 style='background-color: lime;'> Chosen: ". $row["manufacturer"]. " " . $row["brand_and_modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4>";
                        echo "Link: <a href='".$row["link"]."'>".$row["link"]."</a>";
                    }
                }
            }
        } 
        else {
            echo "0 results";
        }
        echo "<br><hr><br>";
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
                    echo "<h4 style='background-color: lightblue;'> Fitting: ". $row["manufacturer"]. " " . $row["brand"]. " " . $row["modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4><br>";

                    $fittingAmount++;           }
                else{
                    //om alla blir röda: visa högre mid gpuer också
                    echo "<h4 style='background-color: red;'> Fitting: ". $row["manufacturer"]. " " . $row["brand"]. " " . $row["modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4><br>";
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
        else{

        }

        if (mysqli_num_rows($result) > 0) {

            //själv checking/felsökning
            echo "Fitting amount: ". $fittingAmount;
            $rand = mt_rand(1, $fittingAmount);
            echo "<br>Random number: ". $rand;

            //get the random part
            $i = 0;

            while($row = mysqli_fetch_assoc($result)) {
                if($row["price"] <= $gpuBudget){
                    $i++;
                    if($i == $rand){
                        echo "<h4 style='background-color: lime;'> Chosen: ". $row["manufacturer"]. " " . $row["brand"]. " " . $row["modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4><br>";
                        echo "Link: <a href='".$row["link"]."'>".$row["link"]."</a>";
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

    }

    function getStorage($conn, $storageBudget, $purpose, $performance){

    }

    function getPSU($conn, $psuBudget, $purpose, $performance){

    }
    
    function getRAM($conn, $RAMBudget, $purpose, $performance){

    }
?>