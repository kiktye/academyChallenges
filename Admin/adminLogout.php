<?php

require_once '../Classes/Admin.php';
require_once '../Database/Connection.php';


session_start();
session_destroy();

header ('Location: ../index.php');


?>