<?php
session_start();
include('check.php');
$obj = new login();
?>
<html>
    <body>
        <?php
        $user_name = $_POST["uname"];
        $password = $_POST["psw"];
        $res = $obj->check($user_name, $password);
        $r = mysqli_fetch_array($res);
        $m = mysqli_num_rows($res);
        if ($m == 1) {
            $_SESSION["user_id"] = $r[0];
            ?>
            <script language="javascript">
                window.location = "home.php";
            </script>
            <?php
        } else {
            ?>
            <script language="javascript">
                window.location = "index.php";
            </script>
    <?php
}
?>