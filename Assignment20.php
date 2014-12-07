<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<title>    Major Project 1   </title>
<style>
body{
margin-right:200px;
background-color:yellow;
color:black;
font-size:20px;
}
</style>
<body>
<?php
//  DECLARING VARIABLES,  THEN  CALCULATIONS THROUGHOUT THE PROGRAM.
     $cost = 0; 
	 $days = 0;
	 $mealPlan = "";
	 $count = 0;
     $errors = "";	 
	 $EMail = "";
	 $extra = "";
    if (filter_has_var(INPUT_POST, "chkOneDay")){
	$cost = filter_input(INPUT_POST, "chkOneDay");
	$days = 1;
    }
    if (filter_has_var(INPUT_POST, "chkTwoDays")){
    $cost = filter_input(INPUT_POST, "chkTwoDays");
	$days =2;
    }
    if (filter_has_var(INPUT_POST, "chkThreeDays")){
	$cost = filter_input(INPUT_POST, "chkThreeDays");
	$days =3;
    }								
global $days, $mealPlan;

$confId = rand(1,1000);
	
 // check if form was already filled out before.
	 if($_POST)
	{	foreach ($_POST as $field_name => $value)
		{	$value = is_array($value) ? $value : trim($value); 
			$$field_name = $value; 
		} 
}		
if($Name == "" || is_numeric($Name))
{
$errors .= "YOU MUST ENTER YOUR NAME. <br>";
}	
if($Address == "")
{
$errors .= "AN ADDRESS MUST BE ENTERED. <br>";
}
if($Company == "" || is_numeric($Company))
{
$errors .= "A COMPANY NAME MUST BE ENTERED. <br>";
}
if($EMail == "" || is_numeric($EMail))
{
$errors .= "YOU MUST ENTER AN E-MAIL.  <br>";
}
if($Zip == "" )
{
$errors .= "YOU MUST ENTER A ZIP CODE. <br>";
}
if($State == "" || is_numeric($State))
{
$errors .= "YOU MUST ENTER A STATE.  <br>";
}
if($City == "" || is_numeric($City))
{
$errors .= "YOU MUST ENTER A CITY. <br>";
}
  if(isset($_POST['mealPlan'])){$mealPlan = $_POST['mealPlan'];} 
{$mealPlan == 'Yes';
}
if($days == ""){
$errors .= "YOU MUST CHECK HOW MANY DAYS YOU ARE ATTENDING THE CONFERENCE.<br>";
} 
if ($days == 1 && $mealPlan =="Yes")
{ $cost = $cost + 50;
}		
if ($days == 2 && $mealPlan == "Yes")
{ $cost = $cost +  75;
}		
if($days == 3 && $mealPlan == "Yes")
{	$cost = $cost +100;
}
if ($days == "Three" && $mealPlan =="Yes")
{ $cost = 225 + 100;
}		
$count = count($extra);
// If errors add to zero, output the printout
if($errors == "")
{
echo <<<aca
<h4>Congratulations $Name.  </h4>
    <p> You wanted $days days(s) </p>
	<br>
	<p> And so we have you registered for $days day(s) at the conference</p>
	<p> Your total cost including meal option if chosen will be:&nbsp <strong> $$cost </strong> </p>
	<p> Bring cash or a credit card to pay for the conference. </p>
	<p> The $track will have discussions about the $track issues, updates, tidbits and you'll love the informative speakers. </p>
    <p> Your Confirmation number is $confId </p>
 <h4> We'll see you at the conference ! </h4> 	

aca;
}
if ($errors != "") {
	echo "<p>Your order can not go through yet.  Please check the error(s) below:<br><br>";
    echo $errors;  	
   	echo "<br> <a href='Assignment20.html'>START OVER ON ENTRY FORM</a>";           
}
?>
</body>
</html>
