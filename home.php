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
$uid = $_SESSION["user_id"];
if (isset($_POST['expense_type'])) {
    $obj = new sql();
    $date_val = $_POST["date"];
    $Comment_val = $_POST["Comment"];
    if (empty($Comment_val)) {
        $Comment_val = "";
    }
    $Amount_val = $_POST["amount"];
    $expense_type_val = $_POST["expense_type"];
    $res = $obj->addexpense($uid, $expense_type_val, $Amount_val, $date_val, $Comment_val);
    if ($res == TRUE) {
        echo "<script>alert('Expense added successfully!!!!');</script>";
    }
}
?>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

    </head>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box}
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        /* Add a background color when the inputs get focus */
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
        .wrapper {
            margin: 0;
            height: 100vh; 
            display: flex; 
            flex-direction: column; 
            justify-content: center;
            width:50%;
        }
    </style>
    <body>
        <div class="wrapper">
            <button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;">Add Expense</button>
            <button onclick="window.location.href = 'view.php'" style="width:auto;">View</button>
        </div>
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <div class="bootstrap-iso">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <form id ="form1" class="form-horizontal" method="post" action="" >
                                <div class="form-group ">
                                    <label class="control-label col-sm-2" for="select">
                                        Choose Expense
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="select form-control" id="expense_type" required="" name="expense_type">
                                            <option value="Food">
                                                Food
                                            </option>
                                            <option value="Travel">
                                                Travel
                                            </option>
                                            <option value="Groceries">
                                                Groceries 
                                            </option>
                                            <option value="Utilities">
                                                Utilities 
                                            </option>
                                            <option value="Clothes">
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
                                        <input class="form-control" id="Amount" name="amount" required="" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-sm-2" for="date">
                                        Date
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required="" type="text"/>
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
        </div>
        <!-- Include jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script>
        // Get the modal
              var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
              window.onclick = function (event) {
                  if (event.target == modal) {
                      modal.style.display = "none";
                  }
              }

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
    </body>
</html>
