<?php

    define('host','localhost');
    define('user','root');
    define('pass','');
    define('base','loja_bd');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new MySQLi(host,user,pass,base);
