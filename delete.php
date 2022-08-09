<?php
$id =$_GET["uid"];
$con=new mysqli("localhost","root","","examdb");
$con->query("DELETE FROM tbl_info WHERE id='$id'");
header("location:index.php");



