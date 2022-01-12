<?php

$connection = mysqli_connect('localhost','root','','brs'); //hosetname or IP / Username cred / Pass cred / Databse name
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

//--------------------connection for DATABASE-LDAP login

/*$connection_emp_info = mysqli_connect('localhost','root','','pet_employees'); //hosetname or IP / Username cred / Pass cred / Databse name
if (!$connection_emp_info) {
  die("Connection failed: " . mysqli_connect_error());
}*/ 
?>