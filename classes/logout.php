<?php
require_once "database.php";
require_once "logup.php";
require_once "signup.php";

$_SESSION = [];
session_unset();
session_destroy();
header("location:../login.php");