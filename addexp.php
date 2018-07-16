/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION["user_id"]))
{
?>
 <script language="javascript">
 window.location='access_denied.php';
 </script>
<?php
}
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

    </head>
    <body>
       <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
       <form id ="form1" class="form-horizontal" method="post" action="addexp.php" >
     <div class="form-group ">
      <label class="control-label col-sm-2" for="select">
       Choose Expense
      </label>
      <div class="col-sm-10">
       <select class="select form-control" id="expense_type" name="expense_type">
        <option value="First Choice">
         Food
        </option>
        <option value="Second Choice">
         Travel
        </option>
        <option value="Third Choice">
         Groceries 
        </option>
          <option value="First Choice">
         Utilities 
        </option>
        <option value="Second Choice">
         Clothes 
        </option>
       </select>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2" for="Amount">
       Amount
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="Amount" name="amount" type="text"/>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2" for="date">
       Date
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2" for="Comment">
       Comment
      </label>
      <div class="col-sm-10">
       <textarea class="form-control" cols="40" id="Comment" name="Comment" rows="10"></textarea>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
<?php
session_start();
$uid=$_SESSION["user_id"];
include("sql.php");
$obj=new sql();
$name=$_POST["date"];
$mail=$_POST["Comment"];
$user_name=$_POST["Amount"];
$pass=$_POST["expense_type"];
$res=$obj->addexpense($uid,$expense_type,$Amount,$date,$Comment,$gender);
?>
    </body>
</html>

