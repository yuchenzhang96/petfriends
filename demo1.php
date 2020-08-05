<!DOCTYPE html>
<html>
<body>

<h1>Stage 4 Demo</h1>

<form method='POST'>
<br>
<input type="submit" name="createDB" value="CreateDB"/>
<input type="submit" name="createTable" value="CreateTable"/>
<h2>Insert records here</h2>
<h4>You must input FirstName, LastName and Email</h4>
Other Instruction:
<p>Yard: Input 1 if you have a yard or 0 if you do not have a yard</p>
<p>Gender: Input 1 if you are male or 0 if you are female</p>
<p>Children: Input 1 if you have children at home or 0 if you do not have</p>
FirstName:
<input type="text" name="firstname" id="firstname" value="">
LastName:
<input type="text" name="lastname" id="lastname" value="">
Email:
<input type="text" name="email" id="email" value="">
Yard:
<input type="text" name="yard" id="yard" value="">
Location:
<input type="text" name="loc" id="loc" value="">
Age:
<input type="text" name="age" id="age" value="">
Gender:
<input type="text" name="gender" id="gender" value="">
ResidenceType:
<input type="text" name="res" id="res" value="">
Children:
<input type="text" name="chi" id="chi" value="">
<input type="submit" name="insert" value="Insert"/>
</form>

<form method = 'POST'>
<h2>Delete records here</h2>
<h4>You must input FirstName, LastName and Email</h4>
FirstName:
<input type="text" name="firstname" id="firstname" value="">
LastName:
<input type="text" name="lastname" id="lastname" value="">
Email:
<input type="text" name="email" id="email" value="">
<input type="submit" name="delete" value="Delete"/>
</form>

<form method = 'POST'>
<h2>Update Records</h2>
The records you want to updated:<br>
FirstName:
<input type="text" name="firstname_update" id="firstname_update" value=""><br>
Set new record:<br>
FirstName:
<input type="text" name="firstname_set" id="firstname_set" value="">
<input type="submit" name="update" value="Update"/>
</form>

<form method = 'POST'>
<h2>Select Records</h2>
<input type="submit" name="select" value="Select"/>
</form>

<form method = 'POST'>
<h2>Default Join Records</h2>
<input type="submit" name="join" value="SelectJoin"/>
</form>
<form method = 'POST'>
<h2>Default Aggregation Records</h2>
<input type="submit" name="aggre" value="Aggregation"/>
</form>


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

function AggreRecords(){
    $conn = SetupServer();

    $sql = "SELECT COUNT(*) AS count, FirstName FROM Users GROUP BY FirstName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo " - FirstName: " . $row["FirstName"]. " - Count: " . $row["count"]."<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

function JoinRecords(){
    $conn = SetupServer();

    $sql = "SELECT Users.FirstName, Users.Lastname, Animals.Type FROM Users NATURAL JOIN Animals";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo " - Name: " . $row["FirstName"]. " " . $row["Lastname"]. " - Animal_Type: " . $row["Type"]  . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

function SelectRecords(){
    $conn = SetupServer();

    $sql = "SELECT UserID, Firstname, Lastname, Email FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["UserID"]. " - Name: " . $row["Firstname"]. " " . $row["Lastname"]. " - Email: " . $row["Email"]  . "<br>";
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

function insertRecords($varlist){

    $conn = SetupServer();

    $sql = "INSERT INTO Users(FirstName, LastName, Email, Yard, Location, Age, Gender, ResidenceType, Children)
    VALUES('$varlist[0]','$varlist[1]','$varlist[2]','$varlist[3]','$varlist[4]','$varlist[5]','$varlist[6]','$varlist[7]','$varlist[8]')";

    if($conn->query($sql) === TRUE){
        echo "Record inserted successfully";
    }
    else{
        echo "Error inserting records: " . $conn->error;
    }
    $conn->close();
}

// function insertRecords($firstname, $lastname, $email){

//     $conn = SetupServer();

//     $sql = "INSERT INTO TESTUSERTABLE(FirstName, LastName, Email)
//     VALUES('$firstname','$lastname','$email')";

//     if($conn->query($sql) === TRUE){
//         echo "Record inserted successfully";
//     }
//     else{
//         echo "Error inserting records: " . $conn->error;
//     }
//     $conn->close();
// }

function DeleteRecords($firstname, $lastname, $email){

    $conn = SetupServer();

    $sql = "DELETE FROM Users WHERE Firstname = '$firstname' AND LastName='$lastname' AND Email='$email'";

    if($conn->query($sql) === TRUE){
        echo "run sql successfully";
    }
    else{
        echo "Error deleting records: " . $conn->error;
    }
    $conn->close();
}

function createDatabase(){

    $servername = "localhost";
    $username = "root";
    $password = "";

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
    createDatabase();
    echo "create function called";
}
if(isset($_POST['createTable'])){
    createTable();
    echo "create function called";
}
if(isset($_POST['insert'])){
    $varlist = array();
    foreach($_POST as $key => $value)
    {
        if($key != 'insert'){
            array_push($varlist, $value);
        }
    }
    insertRecords($varlist);
}
if(isset($_POST['delete'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    DeleteRecords($firstname, $lastname, $email);
}
if(isset($_POST['select'])){
    SelectRecords();
}
if(isset($_POST['join'])){
    JoinRecords();
}
if(isset($_POST['aggre'])){
    AggreRecords();
}
if(isset($_POST['update'])){
    $firstname_update = $_POST['firstname_update'];
    $firstname_set = $_POST['firstname_set'];
    updateRecords($firstname_update, $firstname_set);
}
?>

</body>
</html>
