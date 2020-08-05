<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$min = 30;
$max = 100;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>PetBNB</title>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 150,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min" ).val(ui.values[ 0 ]);
		$( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
</script>

	<script type= "text/javascript">
		$( function(){
			$( "#from" ).datepicker();
		});
		$( function(){
			$( "#to" ).datepicker();
		});
	</script>
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

<style>

.tutorial-table {
    width: 20%;
    font-size: 13px;
    border-top: #e5e5e5 1px solid;
    border-spacing: initial;
    margin: 20px 0px;
    word-break: break-word;
}

.tutorial-table th {
  background-color: #f5f5f5;
	padding: 10px 20px;
	text-align: left;
}

.tutorial-table td {
    border-bottom: #f0f0f0 1px solid;
    background-color: #ffffff;
	padding: 10px 20px;
}

.text-right {
	text-align: right;
}

th.text-right {
	text-align: right;
}


#min {
	float: left;
	width: 50px;
	padding: 5px 10px;
	margin-right: 14px;
}

#slider-range {
	width: 35%;
	float: left;
	margin: 5px 5px 5px 5px;
}

#max {
	width: 50px;
	padding: 5px 10px;
}

.no-result {
	padding: 20px;
	background: #ffdddd;
	text-align: center;
	border-top: #d2aeb0 1px solid;
	color: #6f6e6e;
}

.product-thumb {
	width: 50px;
	height: 50px;
	margin-right: 15px;
	border-radius: 50%;
	vertical-align: middle;
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

</head>

<body>

<table style="width: 100%" cellpadding="5" cellspacing="5">
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
<td class="text-left" rowspan="2" valign="top">
&nbsp;
<form method = 'POST' style="width: 417px">
            <h4>Enter your email, password, and caretaker ID you would like to book!</h4>
            Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <br />
            Password:&nbsp;&nbsp;&nbsp; <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <br />
            CaretakerID: <input type="text" name="caretakerID" id="caretakerID" value="">
            <br />
            To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" required = "required" id="from_date" name="from_date" required="required" value="<?php echo isset($_POST['customer_from_date']) ? $_POST['customer_from_date'] : '' ?>">
            <br />
            From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" required = "required" id="to_date" name="to_date" required="required" value="<?php echo isset($_POST['customer_end_date']) ? $_POST['customer_end_date'] : '' ?>">
            <br />
            &nbsp;<input type="submit" name="reserve" value="Reserve"/><br />
				<img alt="temp2" height="319" src="img7E.jpg" width="263" />
</form> 
</td>

<td class="auto-style10" valign="top">

<div class="container">
	<form class="form-horizontal" method = 'POST'>
	    <div class="form-group"><label for="rec">Find the best caretaker with one click!</label></div>
		<div class="form-group">
			<label class = "control-label col-sm-2" for="zip">Zipcode:</label>
			<div class = "col-sm-2">
				<input type="text" class="form-control" required = "required" id="ziprec" name="ziprec" minlength="5" maxlength="5" required="required" value="<?php echo isset($_POST['ziprec']) ? $_POST['ziprec'] : '' ?>">
			</div>
		</div>
		<div class="form-group">
		      <div class="col-sm-offset-2 col-sm-4">
		<input type="submit" class="btn btn-default" name="rec" value="Recommendation">
		</div>
		</div>
	</form>
</div>

<hr>

<div class="container">
	<form class="form-horizontal" method = 'POST'>
	    
	    <div class="form-group">
		    <label for="detail">Search with details</label>
        </div>
		<div class="form-group">
			<label class = "control-label col-sm-2" for="CustomerFromDate">From:</label>
			<div class = "col-sm-2">
				<input type="date" class="form-control" required = "required" id="customer_from_date" name="customer_from_date" required="required" value="<?php echo isset($_POST['customer_from_date']) ? $_POST['customer_from_date'] : '' ?>">
			</div>
		</div>

		<div class="form-group">
			<label class = "control-label col-sm-2" for="CustomerEndDate">To:</label>
			<div class = "col-sm-2">
				<input type="date" class="form-control" required = "required" id="customer_end_date" name="customer_end_date" required="required" value="<?php echo isset($_POST['customer_end_date']) ? $_POST['customer_end_date'] : '' ?>">
			</div>
		</div>

		<div class="form-group">
			<label class = "control-label col-sm-2" for="zipcode">Zipcode:</label>
			<div class = "col-sm-2">
				<input type="text" class="form-control" required = "required" id="zipcode" name="zipcode" minlength="5" maxlength="5" required="required" value="<?php echo isset($_POST['zipcode']) ? $_POST['zipcode'] : '' ?>">
			</div>
		</div>


        <div class="form-group">
			<label class = "control-label col-sm-2" for="petType">Pet Type:</label>
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

	<div class="form-group">
		<label class = "control-label col-sm-2" for="quantity">Quantity:</label>
		<div class = "col-sm-2">
			<input type="text" class="form-control" required = "required" id="quantity" name="quantity" required="required" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : '' ?>">
		</div>
	</div>

<div class="form-group">
			<label class = "control-label col-sm-2" for="package">Preferred Package:</label>
			<div class = "col-sm-4">
		    <input type="checkbox"  class="form-check-input" name="package[]" value="basic" />
				<label class="form-check-label" for="inlineCheckbox1">Basic</label>
		    <input type="checkbox"  class="form-check-input" name="package[]" value="gold" />
				<label class="form-check-label" for="inlineCheckbox1">Gold</label>
		    <input type="checkbox"  class="form-check-input" name="package[]" value="elite" />
				<label class="form-check-label" for="inlineCheckbox1">Elite</label>
		</div>
</div>

<div class="form-price-range-filter">
  <label class = "control-label col-sm-2" for="budget">Budget ($/day):</label>
        <div>
            <input type="" id="min" name="min_price"
                value="<?php echo $min; ?>">
            <div id="slider-range"></div>
            <input type="" id="max" name="max_price"
                value="<?php echo $max; ?>">
        </div>
</div>

<div class="form-check form-check-inline">
  <label class = "control-label col-sm-2" for="sort">Sort by:</label>
  <div class = "radio-inline col-sm-1">
  <input class="form-check-input" type="radio" name="sort" id="Price" value="Price">
  <label class="form-check-label" for="sort">Price </label>
  </div>
  <div class = "radio-inline col-sm-1">
  <input class="form-check-input" type="radio" name="sort" id="Location" value="Location">
  <label class="form-check-label" for="sort">Location </label>
  </div>
  <div class = "radio-inline col-sm-1">
  <input class="form-check-input" type="radio" name="sort" id="Age" value="Age">
  <label class="form-check-label" for="sort">Age </label>
  </div>
</div>

<br></br>

<b> <font size='4pt'>  The followings are optional: </font> </b>


<br></br>
	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="yard">Yard? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="yard" id="yard" value=1>
	  <label class="form-check-label" for="yard">Required</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="yard" id="no_yard" value=0>
	  <label class="form-check-label" for="yard">Not Required</label>
	</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="children">Children? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="children" id="children" value=0>
	  <label class="form-check-label" for="yard">No Children</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="children" id="no_children" value=1>
	  <label class="form-check-label" for="yard">Not Required</label>
	</div>
	</div>

	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="residence">Residence Type: </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="residence" id="Apt" value="Apt">
	  <label class="form-check-label" for="residence">Apartment</label>
	</div>
		<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="residence" id="House" value="House">
	  <label class="form-check-label" for="residence">House</label>
	</div>
	</div>


	<div class="form-check form-check-inline">
		<label class = "control-label col-sm-2" for="willing_to_drop">Willing to Drop? </label>
		<div class = "col-sm-2">
	  <input class="form-check-input" type="radio" name="drop" id="drop" value=1>
	  <label class="form-check-label" for="drop">Yes</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" name="drop" id="no_drop" value=0>
	  <label class="form-check-label" for="drop">No</label>
	</div>
	</div>

<br> </br>
		<div class="form-group">
		      <div class="col-sm-offset-2 col-sm-4">
		 <button type="submit" class="btn btn-default" name = "search" value = "search">Search</button>
		      </div>
		    </div>
	</form>
</div>



</td>


</tr>
	<tr>
		<td class="auto-style10" valign="top"><?php include_once("test_func.php") ?></td>
	</tr>
</table>

</body>

</html>
