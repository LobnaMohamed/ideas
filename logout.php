<?php
//start session
session_start();

session_unset(); //unset data

session_destroy(); //destroyy

header('location: index.php');

exit();

