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

    // gets user inputs

    $budget = 18000;

    $purpose = 'gaming';
    //--v
    $performance = 'high'; //Intel: i7 och i5; AMD: r5.


    //CPU
    $cpuBudget = $budget * 0.2;

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

    //TO DO: Om flera olika val finns, generera ett random tal som väljer en av dom (som i koden nedan blir blåmarkerade)
    $fittingAmount = 0;

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
            $i++;
                if($i == $rand){
                    echo "<h4 style='background-color: lime;'> Chosen: ". $row["manufacturer"]. " " . $row["brand_and_modifier"]. " " . $row["name"]. ": ". $row["price"]. "kr </h4>";
                    echo "<a href='".$row["link"]."'>".$row["link"]."</a>";
                }
        }
    } 
    else {
        echo "0 results";
    }
?>