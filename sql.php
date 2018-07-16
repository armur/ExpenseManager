<?php

error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');

class sql {

    function get_id($uname) {
//This function gets the user id 
        $obj = new db();
        $sql = "select userid from LoginTable where userid='$uname'";
        $res = $obj->exe($sql);
        $r = mysql_fetch_array($res);
        $id = $r[0];
        return $id;
    }

    function adduser($name, $pass) {
//This function adds the details of a new user to the login table
        $obj = new db();
        $sql1 = "insert into LoginTable(userid,password) values ('$name','$pass')";
        $res = $obj->exe($sql1);
        return $res;
    }

    function addexpense($uid, $expense_type, $Amount, $date, $Comment) {
//This function saves expense details to the database
        $obj = new db();
        $sql = "insert into ExpenseTracker(userid,exp_date,amount,category,comments) values('$uid','$date','$Amount','$expense_type','$Comment')";
        $res = $obj->exe($sql);
        return $res;
    }

    function fetch_daily($uid, $value) {
//This function gets the expense data for a single day	
        $obj = new db();
        $sql = "select * from ExpenseTracker where (exp_date = '$value') and userid = '$uid'";
        $res = $obj->exe($sql);
        return $res;
    }

    function fetch_monthly($uid, $month, $year) {
//This function gets the expense data for a month
        $obj = new db();
        $sql = "select * from ExpenseTracker WHERE (MONTH(exp_date) = $month) AND (YEAR(exp_date) = $year ) and (userid = '$uid')";
        print_r($sql);
        $res = $obj->exe($sql);
        return $res;
    }

    function fetch_yearly($uid, $value) {
//This function gets the expense data for a year
        $obj = new db();
        $sql = "select * from ExpenseTracker where (year(exp_date) = $value) and userid = '$uid'";
        //print_r($sql);
        $res = $obj->exe($sql);
        return $res;
    }

}
