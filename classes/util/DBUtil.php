<?php
namespace classes\util;

use mysqli;
$con = mysqli_connect("localhost", "root", "swordfish", "phpcrudsample");

class DBUtil
{
    public static function getConnection(){
        $config=Config::getConfig();
        $conn = new mysqli($config->mysqlServer, $config->mysqlUser, $config->mysqlPassword,$config->mysqlDB);
        return $conn;
    }
}

