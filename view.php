<!DOCTYPE html>
<?php
session_start();
include('sql.php');
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION["user_id"])) {
    ?>
    <script language="javascript">
        window.location = 'index.php';
    </script>
    <?php
}
?>
<html>
    <head>
        <title>View Data</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>
            * {
                box-sizing: border-box;
            }
            .row::after {
                content: "";
                clear: both;
                display: table;
            }
            [class*="col-"] {
                float: left;
                padding: 15px;
            }
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}
            html {
                font-family: "Lucida Sans", sans-serif;
            }
            .header {
                background-color: #9933cc;
                color: #ffffff;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->

        <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
        <div class="row"></div>
        <div class="header">
            <form id ="form3" class="form-horizontal" method="post" action="viewbyyear.php" >
                <label class="control-label col-sm-2" for="year1">
                    View By Year
                </label>
                <input type="submit" value="Submit" style="float: right" />
                <div style="overflow: hidden; padding-right: .10em;">
                    <select class="form-control" id="year1" required="" name="year1" style="width: 100%;"></select>
                </div>
            </form>
        </div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="header">
            <form id ="form3" class="form-horizontal" method="post" action="viewbymonth.php" >
                <label class="control-label col-sm-2" for="year2">
                    View By Month
                </label>
                <input type="submit" value="Submit" style="float: right" />
                <div style="overflow: hidden; padding-right: .10em;">
                    <select id="year2" name="year2" required=""></select>
                    <select id="Month" name="Month" required="">
                        <option value='' disabled>--Select Month--</option>
                        <option selected value='1'>Janaury</option>
                        <option value='2'>February</option>
                        <option value='3'>March</option>
                        <option value='4'>April</option>
                        <option value='5'>May</option>
                        <option value='6'>June</option>
                        <option value='7'>July</option>
                        <option value='8'>August</option>
                        <option value='9'>September</option>
                        <option value='10'>October</option>
                        <option value='11'>November</option>
                        <option value='12'>December</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form id ="form1" class="form-horizontal" method="post" action="viewbydate.php" >
                            <label class="control-label col-sm-2" for="date">
                                View By Date
                            </label>
                            <input type="submit" value="Submit" style="float: right" />
                            <div style="overflow: hidden; padding-right: .10em;">
                                <input class="form-control" id="date" name="date" required="" placeholder="yyy-mm-dd" type="text" style="width: 100%;"/>
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
             $(document).ready(function () {
                 var date_input = $('input[name="date"]'); //our date input has the name "date"
                 var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                 date_input.datepicker({
                     format: 'yyyy-mm-dd',
                     container: container,
                     todayHighlight: true,
                     autoclose: true,
                 })
             })
        </script>
        <script>
            var start = 1900;
            var end = new Date().getFullYear();
            var options = "";
            for (var year = start; year <= end; year++) {
                options += "<option>" + year + "</option>";
            }
            document.getElementById("year1").innerHTML = options;
            document.getElementById("year2").innerHTML = options;
        </script>
    </body>
</html>

