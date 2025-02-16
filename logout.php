<?php

  
session_start();
$_SESSION['username'] = ''; 
$_SESSION['password'] = ''; 
print "<script>location.href='index.php';</script>";

?>