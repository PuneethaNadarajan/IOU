<?php
session_start();
unset($_SESSION['group_code']);
//if required set successful logout message
header('Location:creategroup.php');
?>