<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
class login
{
 function check($us,$ps)
 {
  $obj=new db();
  $sql="select * from LoginTable where userid='$us'and password='$ps' ";
  $res=$obj->exe($sql);
  return $res;
 }
}
?>