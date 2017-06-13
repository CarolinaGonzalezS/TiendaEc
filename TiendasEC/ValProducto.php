<?php
/**
 * Created by PhpStorm.
 * User: 22A
 * Date: 06/06/2017
 * Time: 18:14
 */
require('utils.php');
$conn=conexion();
if($_POST && isset($_POST))
{
    $id=$_SESSION["idTienda"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $instruccionsql="SELECT * FROM producto WHERE '$codigo'=idProducto";
    $respuesta=$conn->query($instruccionsql);
    if($respuesta->num_rows===1)
    {
        redirect("nuevo_producto.php?error=1&&id=$id");
    }
    $instruccionsql = "INSERT INTO producto(idProducto,nombre,tipo,cantidad,precio,id)
                VALUES ('$codigo','$nombre','$tipo','$cantidad','$precio','$id')";
    $respuesta = $conn->query($instruccionsql);
    if (!$respuesta) {
        redirect("nuevo_producto.php?error=0&&idSelec=$id");
    }
    redirect("DetalleTienda.php?regis=1&&idSelec=$id");

}

