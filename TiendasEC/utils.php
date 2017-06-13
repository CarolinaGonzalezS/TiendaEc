<?php
/**
 * Created by PhpStorm.
 * User: 22A
 * Date: 06/06/2017
 * Time: 17:49
 */
session_start();
function conexion()
{
    $conn=new mysqli('localhost','root','','dbbtiendas');
    $instruccionsql='';
    if ($conn->connect_error)
    {
        echo "error".$conn->connect_error;
        exit();
    }
    return $conn;
}
function redirect($url)
{
    header("Location:$url");
    exit();
}

