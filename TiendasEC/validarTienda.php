<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 10/06/2017
 * Time: 17:54
 */

require('utils.php');
$conn=conexion();
$tienda=$_POST['tienda'];
$usuario=$_POST['usuario'];
$clave1=$_POST['clave1'];
$clave2=$_POST['clave2'];

if ($clave1==$clave2)
{
    $clave=MD5($clave1);
    $instruccionsql=("SELECT * FROM tienda WHERE '$usuario'=usuario");
    $resultado=$conn->query($instruccionsql);
    if($resultado->num_rows>0)
    {
        redirect("registroTienda.php?err=2");
    }
    $instruccionsql=("INSERT INTO TIENDA(nombreTienda, usuario, clave) VALUES('$tienda','$usuario','$clave')");
    $resultado=$conn->query($instruccionsql);
    redirect("index.php");
}
else
{
    redirect("registroTienda.php?err=1");
}