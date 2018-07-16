<?php

class db {

    function connection() {
        $dbhost = '#hostname';
        $dbuser = '#username';
        $dbpass = '#password';
        $con = mysqli_connect($dbhost, $dbuser, $dbpass);
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo 'Connected to MySQL Successfully!';
        //mysql_close($conn);
        mysqli_select_db($con, "expensemanager");
        return $con;
    }

    function exe($sql) {
        $res = mysqli_query($this->connection(), $sql);
        return $res;
    }
}
?>