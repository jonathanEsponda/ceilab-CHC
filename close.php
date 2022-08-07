<?php session_start();

require 'database/db.php';
require 'functions.php';

session_destroy();

header('Location: index.php');



 ?>
