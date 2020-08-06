<html>
<body>

<?php

//Basic Functionality:
//Show how to insert records to the database.
//Show one query that searches the database, and display the returned records in your application.
//Show how to update records.
//Show how to delete records.

// Write two extra SQL queries on a new wiki page titled "SQL Queries",
// linked in the "Documents" section under your team's main page.
// These queries should be more sophisticated than the basic query in CRUD;
// at minimum, they should involve at least two of the following:
// join of multiple relations,
// set operations,
// aggregation via GROUP BY.

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


function updateRecords($firstname_update, $firstname_set){

    $conn = SetupServer();

    $sql = "UPDATE Users SET Firstname='$firstname_set' WHERE Firstname='$firstname_update'";

    if($conn->query($sql) === TRUE){
        echo "Record updated successfully";
    }
    else{
        echo "Error updating records: " . $conn->error;
    }
    $conn->close();
}



function DeleteRecords($firstname){

    $conn = SetupServer();

    $sql = "DELETE FROM Users WHERE Firstname = '$firstname'";

    if($conn->query($sql) === TRUE){
        echo "Record deleted successfully";
    }
    else{
        echo "Error deleting records: " . $conn->error;
    }
    $conn->close();
}

function createDatabase(){
    $servername = "localhost";
    $username = "cs411friends_cs411team34";
    $password = "MT@W[YBTvquf";

    $conn = new mysqli($servername, $username, $password);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE pets";
    if($conn->query($sql) === TRUE){
        echo "Database created successfully";
    }
    else{
        echo "Error creating database:" . $conn->error;
    }
    $conn->close();
}

function createTable(){

    $conn = SetupServer();

    $sql = "CREATE TABLE Users(
        UserID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Yard Boolean,
        Location VARCHAR(50),
        Age INT,
        FirstName VARCHAR(30) NOT NULL,
        LastName VARCHAR(30) NOT NULL,
        Gender Boolean,
        Email VARCHAR(30) NOT NULL,
        Children Boolean,
        ResidenceType VARCHAR(30)
    )";
    if($conn->query($sql) === TRUE){
        echo "Table Users created successfully";
    }
    else{
        echo "Error creating table:" . $conn->error;
    }
    $conn->close();
}

if(isset($_POST['createDB'])){
    //createDatabase();
    echo "create function called";
}
if(isset($_POST['createTable'])){
    createTable();
    //echo "create function called";
}

if(isset($_POST['delete'])){
    //insertRecords();
    $firstname = $_POST['firstname'];
    //$lastname = $_POST['lastname'];
    //$email = $_POST['email'];
    echo 'get here';
    DeleteRecords($firstname);
}

if(isset($_POST['update'])){
    $firstname_update = $_POST['firstname_update'];
    $firstname_set = $_POST['firstname_set'];
    updateRecords($firstname_update, $firstname_set);
}

if(isset($_POST['selectoffer'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    ViewOffers($email, $password);
}

function ViewOffers($email, $password){
    $conn = SetupServer();
        
    $get_pass = "SELECT DISTINCT Password
                FROM Users U JOIN Caretakers C ON (U.UserID=C.CaretakerID)
                WHERE U.Email = '$email'";
    $pass = ($conn->query($get_pass)->fetch_assoc())["Password"];
    
    $get_custID = "SELECT DISTINCT U.UserID
                 FROM Users U
                 WHERE U.Email = '$email'";
    $custID = ($conn->query($get_custID)->fetch_assoc())["UserID"];

    if($password == $pass){
        $sql = "SELECT DISTINCT temp.PurchaseID, U.FirstName, U.LastName, U.Zipcode, U.Email 
            FROM Users U INNER JOIN (SELECT P.CustomerID, P.PurchaseID 
                                    FROM Caretakers C JOIN Purchases P 
                                    WHERE P.CaretakerID = '$custID') temp ON U.UserID = temp.CustomerID";
        
        $result = $conn->query($sql);
    
        if ($result) {
            echo "<table border = '1'; width:600>";
            echo "<tr><td>TransID</td><td>FirstName</td><td>LastName</td><td>Email</td><td>Location</td></tr>\n";
            while($row = $result->fetch_assoc()) {
               // echo "TransID: " .$row["PurchaseID"] . " - Name: " . $row["FirstName"]. " " . $row["LastName"]. " - Email: " . $row["Email"]  . " - Location: " . $row["Zipcode"] .  "<br>";
                echo "<tr><td>{$row['PurchaseID']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td><td>{$row['Email']}</td><td>{$row['Zipcode']}</td></tr>\n";    
            }
            echo "</table>";
        } 
        else {echo "0 results";}
    }
    
    else{
        echo "Wrong password, try again.";
    }
    
    $conn->close();
}

if(isset($_POST['reject'])){
    $transID = $_POST['transID'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    RejectOffers($transID, $password, $email);
}

function RejectOffers($transID, $password, $email){
    $conn = SetupServer();
    
    $get_pass = "SELECT DISTINCT Password
                FROM Users U JOIN Caretakers C ON (U.UserID=C.CaretakerID)
                WHERE U.Email = '$email'";
    $pass = ($conn->query($get_pass)->fetch_assoc())["Password"];
    
    $get_custID = "SELECT DISTINCT U.UserID
                 FROM Users U
                 WHERE U.Email = '$email'";
    $custID = ($conn->query($get_custID)->fetch_assoc())["UserID"];
    
    if($password == $pass){
    
        $sql = "UPDATE Purchases
                SET Accepted = 0
                WHERE PurchaseID = '$transID'";
        
        $result = $conn->query($sql);
    
        if ($conn->query($sql) === TRUE) {
        // output data of each row
                echo "Offer Rejected!";
        } else {
            echo "0 results";
        }
    }
    
    else{
        echo "Wrong password, try again.";
    }
    $conn->close();
}


if(isset($_POST['accept'])){
    $transID = $_POST['transID'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    AcceptOffers($transID, $password, $email);
}

function AcceptOffers($transID, $password, $email){
    $conn = SetupServer();

    $get_pass = "SELECT DISTINCT Password
                FROM Users U JOIN Caretakers C ON (U.UserID=C.CaretakerID)
                WHERE U.Email = '$email'";
    $pass = ($conn->query($get_pass)->fetch_assoc())["Password"];
    
    $get_custID = "SELECT DISTINCT U.UserID
                 FROM Users U
                 WHERE U.Email = '$email'";
    $custID = ($conn->query($get_custID)->fetch_assoc())["UserID"];

    if($password == $pass){
        $sql = "UPDATE Purchases
                SET Accepted = 1
                WHERE PurchaseID = '$transID'";
        
        $result = $conn->query($sql);
    
        if ($conn->query($sql) === TRUE) {
        // output data of each row
                echo "Offer Accepted!";
        } else {
            echo "0 results";
        }
        
    }
    
    else{
        echo "Wrong password, try again.";
    }
    $conn->close();
}

if(isset($_POST['merge'])){
    $caretakerID = $_POST['caretakerID'];
    $newval = $_POST['newval'];

    Merge($caretakerID, $newval);
}

function Merge($caretakerID,  $newval){
    $conn = SetupServer();

    $sql = "INSERT INTO Animals (CaretakerID, Type) VALUES ($caretakerID, '$newval')";
    
    $result = $conn->query($sql);

    echo "Inserted!";


    $conn->close();
}

if(isset($_POST['search'])){
    $from = $_POST['customer_from_date'];
    $to= $_POST['customer_end_date'];
    $zipcode = $_POST['zipcode'];
    $pet = isset($_POST['pet']) ? "('" . implode("','", $_POST['pet']) . "')" : '';
    $quantity = $_POST['quantity'];
    $min = $_POST['min_price'];
    $max = $_POST['max_price'];
    $package = isset($_POST['package']) ? "('" . implode("','", $_POST['package']) . "')" : '';
    $sort = $_POST['sort'];
    $yard = isset($_POST['yard']) ? $_POST['yard'] : '';
    $children = isset($_POST['children']) ? $_POST['children'] : '';
    $residence = isset($_POST['residence']) ? $_POST['residence'] : '';
    $drop = isset($_POST['drop']) ? $_POST['drop'] : '';
    SearchRecords($from, $to, $zipcode, $pet, $quantity, $min, $max, $package, $sort,
    $yard, $children, $residence, $drop);
}

function SearchRecords($from, $to, $zipcode, $pet, $quantity, $min, $max, $package, $sort,
$yard, $children, $residence, $drop){
        $conn = SetupServer();
    if($pet == ''){
        $conn->close();
        exit( "<div style='font-size:150%; color:orange'>" .  "Please select your pet type. " . "</div>");
    }
    if ($package == '') {
        $conn->close();
        exit( "<div style='font-size:150%; color:orange'>" .  "Please select your preferred package." . "</div>" );
    }
    if($sort == ''){
        $conn->close();
        exit( "<div style='font-size:150%; color:orange'>" .  "Please choose a way to sort the results. " . "</div>");
    }
    $sql1 = "SELECT C.CaretakerID, U.Age AS Age, ABS('$zipcode' - U.Zipcode) AS Location 
              FROM Caretakers C
              LEFT JOIN Users U ON U.UserID = C.CaretakerID
              WHERE C.FromDate <= '$from' AND C.ToDate >= '$to'
              AND C.Price <= '$max' AND C.Price >= '$min'
              AND C.CaretakerID NOT IN (SELECT DISTINCT CaretakerID FROM Purchases
                                            WHERE Accepted = 1 AND ((FromDate BETWEEN '$from' AND '$to') OR (ToDate BETWEEN '$from' AND '$to')))
              AND C.CaretakerID IN (SELECT DISTINCT CaretakerID FROM Animals WHERE Type IN $pet AND MaxQuantity >= '$quantity')
              AND C.CaretakerID IN (SELECT DISTINCT CaretakerID FROM Packages WHERE PackageOffered IN $package)
              AND (C.Yard = '$yard' OR '$yard' = '')
              AND (C.Children = '$children' OR '$children' = 1 OR '$children' = '')
              AND (C.ResidenceType = '$residence' OR '$residence' = '')
              AND (C.WTT = 1 OR '$drop' = '1' OR '$drop' = '')
              AND ABS('$zipcode' - U.Zipcode) <= 5 
              ORDER BY ".$sort;

    $result1 = $conn->query($sql1);
    $rnum = $result1->num_rows;
    if (!empty($result1) && $rnum > 0) {
    //  $ID = $Name = $Email = $Age = $Zipcode = $Price = $Package = $Yard = $Children = $ResidenceType = $WTT = array();
    echo "<table border = '1'; width:600>";
    echo "<tr><td>ID</td><td>FirstName</td><td>LastName</td><td>Email</td><td>Age</td><td>Zipcode</td><td>Price</td><td>Package</td><td>Yard</td>
    <td>Children</td><td>ResidenceType</td><td>WillingToPickUp</td></tr>\n";
     while($row1 = $result1->fetch_assoc()) {
       $caretaker_id =  $row1["CaretakerID"];
       $sql = "SELECT * FROM Users
               LEFT JOIN Caretakers ON Users.UserID = Caretakers.CaretakerID
               LEFT JOIN Packages ON Users.UserID = Packages.CaretakerID
               WHERE UserID = '$caretaker_id'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       echo "<tr><td>{$row['UserID']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td><td>{$row['Email']}</td><td>{$row['Age']}</td>
       <td>{$row['Zipcode']}</td><td>{$row['Price']}</td><td>{$row['PackageOffered']}</td><td>{$row['Yard']}</td>
       <td>{$row['Children']}</td><td>{$row['ResidenceType']}</td><td>{$row['WTT']}</td></tr>\n";
        }
    echo "</table>";
    }
    else {
        echo "0 results";
    }
    $conn->close();
}


if(isset($_POST['insert'])){
    //insertRecords();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $zipcode = $_POST['zipcode'];
    $age = $_POST['age'];
    $role = ($_POST['role'])[0];
    //caretakers'
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $pet = $_POST['pet'];
    $package = $_POST['package'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $residence = $_POST['residence'];
    $yard = $_POST['yard'];
    $children = $_POST['children'];
    $willingToPickup = $_POST['pickup'];
    insertRecords($firstname, $lastname, $email, $password, $repassword, $zipcode, $age,
    $role, $startdate, $enddate, $pet, $package, $quantity, $price, $residence, $yard, $children, $willingToPickup);
}

function insertRecords($firstname, $lastname, $email, $password, $repassword, $zipcode, $age,
$role, $startdate, $enddate, $pet, $package, $quantity, $price, $residence, $yard, $children, $willingToPickup){
    $conn = SetupServer();
    $select = "SELECT Email FROM Users WHERE Email = ? LIMIT 1";
    $insert = "INSERT INTO Users (FirstName, LastName, Email, Password, Zipcode, Age) VALUES(?,?,?,?,?,?)";
    //Prepare statement
    $stmt = $conn->prepare($select);
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $stmt -> bind_result($email);
    $stmt -> store_result();
    $rnum = $stmt->num_rows;
    if($password != $repassword){
      echo "<p> <font color=red size='4pt'> The password you entered did not match.</font></p>";
    }
    elseif ($startdate > $enddate) {
      echo "<p> <font color=red size='4pt'> The date you entered is not valid. </font></p>";
    }
    else{
      if($rnum == 0){
        $stmt = $conn->prepare($insert);
        $stmt -> bind_param("ssssii",$firstname,$lastname,$email,$password,$zipcode,$age);
        $stmt -> execute();
        $get_id = "SELECT UserID FROM Users WHERE Email = '$email'";
        $user_id = ($conn->query($get_id)->fetch_assoc())["UserID"];
        if($role == 'Customer'){
          // Customers
          // $insert = "INSERT INTO Customers (CustomerID, FromDate, ToDate) VALUES (?,?,?)";
          // $stmt = $conn->prepare($insert);
          // $stmt -> bind_param("iss", $user_id, $startdate, $enddate);
          // $stmt -> execute();
        }
        else { // Caretakers
          $insert = "INSERT INTO Caretakers (CaretakerID, FromDate, ToDate, Price, Yard, Children, ResidenceType, WTT) VALUES (?,?,?,?,?,?,?,?)";
          $stmt = $conn->prepare($insert);
          $stmt -> bind_param("issiiisi", $user_id, $startdate, $enddate, $price, $yard, $children, $residence, $willingToPickup);
          $stmt -> execute();
          foreach ($pet as $pet_value) { // Animals
            $insert_pet = "INSERT INTO Animals (CaretakerID, Type, MaxQuantity) VALUES (?,?,?)";
            $stmt = $conn->prepare($insert_pet);
            $stmt -> bind_param("isi", $user_id, $pet_value, $quantity);
            $stmt -> execute();
          }
          $insert_package = "INSERT INTO Packages (CaretakerID, PackageOffered) VALUES (?,?)";
          $stmt = $conn->prepare($insert_package);
          $stmt -> bind_param("is", $user_id, $package);
          $stmt -> execute();
          }
          echo "<p> <font color=green size='4pt'> Record inserted successfully! </font></p>";

      }
      else{
          echo "<p> <font color=red size='4pt'> Someone already registered using this email! If you'd like to update your record, please choose 'Update Records'. </font></p>";
        }
    }
    $stmt->close();
    $conn->close();
}

if(isset($_POST['reserve'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $caretakerID = $_POST['caretakerID'];
    $from = $_POST['from_date'];
    $to = $_POST['to_date'];
    
    Reserve($email, $password, $caretakerID, $from, $to);
}

function Reserve($email, $password, $caretakerID, $from, $to){
    $conn = SetupServer();

    $get_pass = "SELECT DISTINCT Password
                 FROM Users U 
                 WHERE U.Email = '$email'";
    $pass = ($conn->query($get_pass)->fetch_assoc())["Password"];
    
    $get_custID = "SELECT DISTINCT U.UserID
                 FROM Users U
                 WHERE U.Email = '$email'";
    $custID = ($conn->query($get_custID)->fetch_assoc())["UserID"];
    
    if($password == $pass){
    
        $sql = "INSERT INTO Purchases (CaretakerID, CustomerID, FromDate, ToDate) VALUES ($caretakerID, $custID, '$from', '$to')";
        $result = $conn->query($sql);
        
    echo "Inserted!";
    }
    
    else{
        echo "Wrong password, try again.";
    }
    $conn->close();
}


if(isset($_POST['updateprice'])){
    $price = $_POST['price'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    UpdatePrice($price, $password, $email);
}

function UpdatePrice($price, $password, $email){
    $conn = SetupServer();

    $get_pass = "SELECT DISTINCT Password
                FROM Users U JOIN Caretakers C ON (U.UserID=C.CaretakerID)
                WHERE U.Email = '$email'";
    $pass = ($conn->query($get_pass)->fetch_assoc())["Password"];
    
    $get_custID = "SELECT DISTINCT U.UserID
                 FROM Users U
                 WHERE U.Email = '$email'";
    $custID = ($conn->query($get_custID)->fetch_assoc())["UserID"];

    if($password == $pass){
        $sql = "UPDATE Caretakers
                SET Price = $price
                WHERE CaretakerID = '$custID'";
        
        $result = $conn->query($sql);
    
        if ($conn->query($sql) === TRUE) {
        // output data of each row
                echo "Price Changed!";
        } else {
            echo "0 results";
        }
        
    }
    
    else{
        echo "Wrong password, try again.";
    }
    $conn->close();
}

if(isset($_POST['rec'])){
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
            
            // select the highest price and lowest price, 70 * (1- current_price/(max_price-min_price))
            // determine if the type is house then +10, apt then +0
            // determine if the yard is 1 then +10, no yard then +0
            // determine if no children then + 10, has children then +0 
            $maxprice_sql = "SELECT MAX(Price) AS maxprice FROM Caretakers";
            $maxprice = ($conn->query($maxprice_sql)->fetch_assoc())["maxprice"];

            $minprice_sql = "SELECT MIN(Price) AS minprice FROM Caretakers";
            $minprice = ($conn->query($minprice_sql)->fetch_assoc())["minprice"];

            $rating_sql = "UPDATE Caretakers SET Caretakers.Rating = 70 * (1 -(Caretakers.Price-'$minprice')/('$maxprice'-'$minprice')) 
            + 10 * (1-Caretakers.Children) + 10 * Caretakers.Yard";
            $rating = $conn->query($rating_sql);

            $type_sql = "UPDATE Caretakers SET Caretakers.Rating = Caretakers.Rating + 10 WHERE Caretakers.ResidenceType = 'House'";
            $type = $conn->query($type_sql);
            
            $sql = "SELECT U.UserID AS id, U.Zipcode AS zip, C.Rating AS rating, C.FromDate AS fromdate, C.ToDate AS todate 
            FROM Caretakers C LEFT JOIN Users U ON (U.UserID = C.CaretakerID)  
            WHERE Zipcode = '$zipcode' ORDER BY rating DESC" ;
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "CaretakerID: " . $row["id"]. " - Zipcode: " . $row["zip"]. " - Rating: " . $row["rating"] . "/100 - From: " . $row["fromdate"] ." - To: " . $row["todate"] ."<br>";
                }
                echo "If you want to find other caretakers, please provide more details and we provide you the best caretaker!";
            } else {
                echo "0 results";
            }
        }
        else{
            echo "No matched zipcode here. We will recommend caretaker closest to your area.";
            echo "<br>";
            
            
            // select the highest price and lowest price, 70 * (1- current_price/(max_price-min_price))
            // determine if the type is house then +10, apt then +0
            // determine if the yard is 1 then +10, no yard then +0
            // determine if no children then + 10, has children then +0 
            $maxprice_sql = "SELECT MAX(Price) AS maxprice FROM Caretakers";
            $maxprice = ($conn->query($maxprice_sql)->fetch_assoc())["maxprice"];

            $minprice_sql = "SELECT MIN(Price) AS minprice FROM Caretakers";
            $minprice = ($conn->query($minprice_sql)->fetch_assoc())["minprice"];

            $rating_sql = "UPDATE Caretakers SET Caretakers.Rating = 70 * (1 -(Caretakers.Price-'$minprice')/('$maxprice'-'$minprice')) + 10 * (1-Caretakers.Children) + 10 * Caretakers.Yard";
            $rating = $conn->query($rating_sql);

            $type_sql = "UPDATE Caretakers SET Caretakers.Rating = Caretakers.Rating + 10 WHERE Caretakers.ResidenceType = 'House'";
            $type = $conn->query($type_sql);
            
            $sql = "SELECT U.UserID AS id, U.Zipcode AS zip, C.Rating AS rating, C.FromDate AS fromdate, C.ToDate AS todate FROM Caretakers C LEFT JOIN Users U ON (U.UserID = C.CaretakerID) ORDER BY ABS(U.Zipcode-$zipcode), rating DESC LIMIT 5";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "CaretakerID: " . $row["id"]. " - Zipcode: " . $row["zip"]. " - Rating: " . $row["rating"] . "/100 - From: " . $row["fromdate"] ." - To: " . $row["todate"] ."<br>";

                }
                echo "If you want to find other caretakers, please provide more details and we provide you the best caretaker!";
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