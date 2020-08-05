<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
.auto-style1 {
	text-align: right;
}
.auto-style3 {
	text-align: center;
}
.auto-style5 {
	text-decoration: none;
}
.auto-style7 {
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
}
.auto-style8 {
	color: #000000;
	font-size: xx-large;
	font-family: Arial, Helvetica, sans-serif;
}
.auto-style9 {
	border-width: 0px;
}
</style>
<script type="text/javascript">
<!--
function FP_changeProp() {//v1.0
 var args=arguments,d=document,i,j,id=args[0],o=FP_getObjectByID(id),s,ao,v,x;
 d.$cpe=new Array(); if(o) for(i=2; i<args.length; i+=2) { v=args[i+1]; s="o";
 ao=args[i].split("."); for(j=0; j<ao.length; j++) { s+="."+ao[j]; if(null==eval(s)) {
  s=null; break; } } x=new Object; x.o=o; x.n=new Array(); x.v=new Array();
 x.n[x.n.length]=s; eval("x.v[x.v.length]="+s); d.$cpe[d.$cpe.length]=x;
 if(s) eval(s+"=v"); }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}

function FP_changePropRestore() {//v1.0
 var d=document,x; if(d.$cpe) { for(i=0; i<d.$cpe.length; i++) { x=d.$cpe[i];
 if(x.v=="") x.v=""; eval("x."+x.n+"=String(x.v)"); } d.$cpe=null; }
}
// -->
</script>
<title>PetBNB</title>
</head>

<body>

<table style="width: 100%">
	<tr>
		<td class="auto-style1" style="width: 20%; height: 20%">
		<a href="default.php">
		<img alt="Logo" height="100%" src="img11.jpg" width="100%" class="auto-style9" /></a></td>
		<td style="height: 100%">
		<table style="width: 100%; height: 200px;" cellpadding="0" cellspacing="0">
			<tr>
				<td class="auto-style7" id="id1" onmouseout="FP_changePropRestore()" onmouseover="FP_changeProp(/*id*/'id1',1,'style.backgroundColor','#FFA500','style.color','#FFFFFF')">
				<a href="CareTaker.php" style="display:block; height: 70px;" class="auto-style5">
				<span class="auto-style8">SEARCH CARE TAKERS</span></a></td>
				<td class="auto-style3" id="id2" onmouseout="FP_changePropRestore()" onmouseover="FP_changeProp(/*id*/'id2',1,'style.backgroundColor','#FFA500','style.color','#FFFFFF')">
				<a href="JobSearch.php" style="display:block; height: 70px;" class="auto-style5">
				<span class="auto-style8">VIEW JOB OFFERS</span></a></td>
				<td class="auto-style3" id="id3" onmouseout="FP_changePropRestore()" onmouseover="FP_changeProp(/*id*/'id3',1,'style.backgroundColor','#FFA500','style.color','#FFFFFF')">
				<a href="MyAccount.php" style="display:block; height: 70px;" class="auto-style5">
				<span class="auto-style8">MY ACCOUNT</span></a></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
				<td class="auto-style3" rowspan="2">
				<img alt="temp3" height="293" src="img81.jpg" width="312" /></td>
		<td class="auto-style10" valign="top">


<div class="container">
<form method='POST' class="form-horizontal">
<h1><font color=orange size='12pt'>Sign Up Today!</font></h1>
<div class="form-group">
	<label class = "control-label col-sm-2" for="FirstName">First Name:</label>
	<div class = "col-sm-4">
		<input type="text" name="firstname" id="firstname" value="" required="required" onkeyup='saveValue(this);'>
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="LastName">Last Name:</label>
	<div class = "col-sm-4">
		<input type="text" name="lastname" id="lastname" value="" required="required">
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="Email">Email:</label>
	<div class = "col-sm-4">
		<input type="email" name="email" id="email" value="" required="required">
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="password">Password:</label>
	<div class = "col-sm-4">
		<input type="password" name="password" id="password" value="" required="required">
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="repassword">Re-enter Password:</label>
	<div class = "col-sm-4">
		<input type="password" name="repassword" id="repassword" value="" required="required">
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="zipcode">Zipcode:</label>
	<div class = "col-sm-4">
		<input type="text" name="zipcode" id="zipcode" value="" minlength="5" maxlength="5" >
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="age">Age:</label>
	<div class = "col-sm-4">
		<input type="text" name="age" id="age" value="" >
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="role">Enrolled As:</label>
	<div class = "col-sm-4">
		<input type="checkbox" id="Customer" name="role[]" value = "Customer"/>Customer
		<input type="checkbox" id="Caretaker" name="role[]" value = "CareTaker"/>Care Taker  <p>(Choose one)</p>
	</div>
</div>


<b> <font size = '4pt' color='orange'>The followings are for caretakers only. If you're a customer, please skip them and submit directly. </font> </b>
<br> </br>
<div class="form-group">
	<label class = "control-label col-sm-2" for="startdate">Available From:</label>
	<div class = "col-sm-4">
		<input type="date" id="startdate" value= "" name="startdate" placeholder=" mm/dd/yyyy">
	</div>
</div>

<div class="form-group">
	<label class = "control-label col-sm-2" for="enddate">Available To:</label>
	<div class = "col-sm-4">
		<input type="date" id="enddate" value = "" name="enddate" placeholder=" mm/dd/yyyy">
	</div>
</div>


<div class="form-group">
			<label class = "control-label col-sm-2" for="petType">Preferred Pet Type:</label>
			<div class = "col-sm-4">
		    <input type="checkbox"  class="form-check-input" name="pet[]" value="Dog" />
				<label class="form-check-label" for="inlineCheckbox1">Dog</label>
		    <input type="checkbox"  class="form-check-input" name="pet[]" value="Cat" />
				<label class="form-check-label" for="inlineCheckbox1">Cat</label>
		    <input type="checkbox"  class="form-check-input" name="pet[]" value="Hamster" />
				<label class="form-check-label" for="inlineCheckbox1">Hamster</label>
		    <input type="checkbox"  class="form-check-input" name="pet[]" value="Rabbit" />
				<label class="form-check-label" for="inlineCheckbox1">Rabbit</label>
		    <input type="checkbox"  class="form-check-input" name="pet[]" value="Bird" />
				<label class="form-check-label" for="inlineCheckbox1">Bird</label>
		</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="package">Package Offered:</label>
		<div class = "col-sm-1">
	  <input class="form-check-input" type="radio" name="package" id="basic" value="basic">
	  <label class="form-check-label" for="package">Basic</label>
		</div>
		<div class="col-sm-1">
	  <input class="form-check-input" type="radio" name="package" id="gold" value="gold">
	  <label class="form-check-label" for="package">Gold</label>
		</div>
		<div class="col-sm-1">
		<input class="form-check-input" type="radio" name="package" id="elite" value="elite">
		<label class="form-check-label" for="package">Elite</label>
		</div>
	</div>
<br></br>
	<div class="form-group">
		<label class = "control-label col-sm-2" for="quantity">Max Pet Quantity:</label>
		<div class = "col-sm-2">
			<input type="text" class="form-control"  id="quantity" name="quantity" >
		</div>
	</div>

	<div class="form-group">
		<label class = "control-label col-sm-2" for="price">Price ($/day):</label>
		<div class = "col-sm-2">
			<input type="text" class="form-control"  id="price" name="price" >
		</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="residence">Residence Type:</label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="residence" id="Apt" value="Apt">
	  <label class="form-check-label" for="inlineRadio1">Apartment</label>
		</div>
		<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="residence" id="House" value="House">
	  <label class="form-check-label" for="inlineRadio2">House</label>
		</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="yard">Yard? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="yard" id="yard" value=1>
	  <label class="form-check-label" for="yard">Yes</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="yard" id="no_yard" value=0>
	  <label class="form-check-label" for="yard">No</label>
	</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="children">Children? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="children" id="children" value=1>
	  <label class="form-check-label" for="yard">Yes</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="children" id="no_children" value=0>
	  <label class="form-check-label" for="yard">No</label>
	</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="willing_to_pickup">Willing to Pickup? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="pickup" id="pickup" value=1>
	  <label class="form-check-label" for="drop">Yes</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="pickup" id="no_pickup" value=0>
	  <label class="form-check-label" for="drop">No</label>
	</div>
	</div>

<br></br>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
	 		<button type="submit" class="btn btn-default" name = "insert" value = "insert">Submit</button>
		</div>
	</div>
</form>
</div>









</td>
	</tr>
	<tr>
		<td class="auto-style10" valign="top">
		<?php include_once("test_func.php") ?></td>
	</tr>
</table>

</body>

</html>
