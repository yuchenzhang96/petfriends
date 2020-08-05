<?php

function SetupServer(){

    $servername = "localhost";
    $username = "cs411friends_cs411team34";
    $password = "MT@W[YBTvquf";
    $dbname = "cs411friends_PETFRIEND";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


if(isset($_POST['rec'])){
    echo "get here";
    $zipcode = $_POST['ziprec'];
    RecommendRecords($zipcode);
}

function RecommendRecords($zipcode){
    $conn = SetupServer();
    $index = "CREATE INDEX zipidx ON Users (Zipcode)";
    $conn->query($index);
    if($zipcode == ''){
        echo 'Please enter your zipcode so we could recommend the best caretaker!';
    }
    else{
        $zipquery = "SELECT * FROM Caretakers LEFT JOIN Users ON (Caretakers.CaretakerID=Users.UserID) WHERE Users.Zipcode = '$zipcode'";
        $ziplist = $conn->query($zipquery);
        $iszipnull = $ziplist->num_rows;
        
        if($iszipnull > 0){
            $sql = "SELECT U.UserID AS id, U.Zipcode AS zip, C.Rating AS rating, C.FromDate AS fromdate, C.ToDate AS todate FROM Caretakers C LEFT JOIN Users U ON (U.UserID = C.CaretakerID) ORDER BY rating DESC ,zip LIMIT 1" ;
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "CaretakerID: " . $row["id"]. " - Zipcode: " . $row["zip"]. " - Rating: " . $row["rating"] . " - From: " . $row["fromdate"] ." - To: " . $row["todate"] ."<br>";
                    echo "If you want to find other caretakers, please provide more details and we provide you the best caretaker!";
                }
            } else {
                echo "0 results";
            }
        }
        else{
            echo "No matched zipcode here. We will recommend caretaker cloest to your area.";
            echo "<br>";
            $sql = "SELECT U.UserID AS id, U.Zipcode AS zip, C.Rating AS rating, C.FromDate AS fromdate, C.ToDate AS todate FROM Caretakers C LEFT JOIN Users U ON (U.UserID = C.CaretakerID) ORDER BY ABS(U.Zipcode-$zipcode), rating DESC LIMIT 1";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "CaretakerID: " . $row["id"]. " - Zipcode: " . $row["zip"]. " - Rating: " . $row["rating"] . " - From: " . $row["fromdate"] ." - To: " . $row["todate"] ."<br>";
                    echo "If you want to find other caretakers, please provide more details and we provide you the best caretaker!";
                }
            } else {
                echo "0 results";
            }
        }
    }

    $conn->close();
}
?>

</body>
</html>