<?php include_once("functions.php") ?>
<!-- ^ is the only PHP you will need to include a separate PHP file -->
<!DOCTYPE html>
<html>
<body>
<form method='POST'>
<br>
<input type="submit" name="createDB" value="CreateDB"/>
<input type="submit" name="createTable" value="CreateTable"/>
<br><h4>Test insert records here: You must input FirstName, LastName and Email</h4>
FirstName:
<input type="text" name="firstname" id="firstname" value="">
LastName:
<input type="text" name="lastname" id="lastname" value="">
Email:
<input type="text" name="email" id="email" value="">
<input type="submit" name="insert" value="Insert"/>
</form>

<form method = 'POST'>
<br><h4>Test delete records here: You must input FirstName, LastName and Email</h4>
FirstName:
<input type="text" name="firstname" id="firstname" value="">
LastName:
<input type="text" name="lastname" id="lastname" value="">
Email:
<input type="text" name="email" id="email" value="">
<input type="submit" name="delete" value="Delete"/>
</form>

<form method = 'POST'>
<br><h4>Select Records</h4>
<input type="submit" name="select" value="Select"/>
</form>

<form method = 'POST'>
<br><h4>Update Records</h4>
The records you want to updated:<br>
FirstName:
<input type="text" name="firstname_update" id="firstname_update" value=""><br>
Set new record:<br>
FirstName:
<input type="text" name="firstname_set" id="firstname_set" value="">
<input type="submit" name="update" value="Update"/>
</form>
</body>