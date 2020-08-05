<!DOCTYPE html>
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

function SelectRecords($firstname, $lastname){
    $conn = SetupServer();

    $sql = "SELECT UserID, FirstName, LastName, Email FROM Users WHERE FirstName = '$firstname' AND LastName = '$lastname'";
    $result = $conn->query($sql);

    if ($result) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["UserID"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. " - Email: " . $row["Email"]  . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
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

if(isset($_POST['insert'])){
    //insertRecords();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $zipcode = $_POST['zipcode'];
    $age = $_POST['age'];
    $role = ($_POST['role'])[0];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    insertRecords($firstname, $lastname, $email, $password, $repassword, $zipcode, $age, $role, $startdate, $enddate);
}

function insertRecords($firstname, $lastname, $email, $password, $repassword, $zipcode, $age, $role, $startdate, $enddate){
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
          $insert = "INSERT INTO Customers (CustomerID, FromDate, ToDate) VALUES (?,?,?)";
        }
        else {
          $insert = "INSERT INTO Caretakers (CareTakerID, FromDate, ToDate) VALUES (?,?,?)";
        }
        $stmt = $conn->prepare($insert);
        $stmt -> bind_param("iss", $user_id, $startdate, $enddate);
        $stmt -> execute();
        echo "<p> <font color=green size='4pt'> Record inserted successfully! </font></p>";
      }
      else{
          echo "<p> <font color=red size='4pt'> Someone already registered using this email! If you'd like to update your record, please choose 'Update Records'. </font></p>";
        }
    }
    $stmt->close();
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
if(isset($_POST['select'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    SelectRecords($firstname, $lastname);
}
if(isset($_POST['update'])){
    $firstname_update = $_POST['firstname_update'];
    $firstname_set = $_POST['firstname_set'];
    updateRecords($firstname_update, $firstname_set);
}
?>



</body>
</html>
