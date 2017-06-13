<?php
/**
 * Created by PhpStorm.
 * User: 22A
 * Date: 06/06/2017
 * Time: 17:50
 */
require('utils.php');
$conn=conexion();
if($_POST)
{
    $usuario=$_POST["usuario"];
    $clave=MD5($_POST["clave"]);
    $instruccionsql="SELECT * FROM tienda WHERE '$usuario'=usuario AND '$clave'=clave";
    $respuesta=$conn->query($instruccionsql);
    //identico es el triple igual
    if($respuesta->num_rows===1)
    {
        while ($row=$respuesta->fetch_assoc())
        {
            $_SESSION['usuario']=['usuario'=>$row['usuario'],'nombre'=>$row['nombreTienda']];
            $id=$row['id'];
            $_SESSION["idTienda"]=$id;
            redirect("inicio.php");
        }
    }else
    {
        redirect("index.php?err=1");
    }
}else
{
    redirect("index.php?err=0");
}
