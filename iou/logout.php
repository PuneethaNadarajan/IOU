<?php
session_start();
unset($_SESSION['user_id']);
//if required set successful logout message
header('Location:first.html');
?>