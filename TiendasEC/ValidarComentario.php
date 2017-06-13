<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 10/06/2017
 * Time: 20:43
 */
require('utils.php');
$conn=conexion();
$idTienda=$_SESSION["idTienda"];
if($_POST && isset($_POST))
{
    if($_GET["type"]==1){
        $idSelec=$_GET["idS"];
        $descripcion=$_POST["comentario"];
        $fecha=date("y-m-d");
        $instruccionsql="INSERT INTO comentario(descripcion,fecha,id,idTienda) VALUES ('$descripcion','$fecha','$idTienda','$idSelec')";
        $respuesta=$conn->query($instruccionsql);
    if(!$respuesta)
    {
        redirect("DetalleTienda.php?err=1&&idSelec=$idSelec");
    }
    else
    {
        echo $fecha;
        redirect("DetalleTienda.php?idSelec=$idSelec");
    }
    }

    elseif($_GET["type"]==2){
        $idSelec=$_GET["idSelec"];
        $idCome=$_GET["idC"];
        $fecha=date("y-m-d");
        $descripcion=$_POST["comentar"];
        echo $idSelec."<br>";
        echo $idCome."<br>";
        echo $fecha."<br>";
        echo $descripcion."<br>";
        $instruccionsql="INSERT INTO subcomentario(descripcion,idComentario,fecha,idTienda) VALUES('$descripcion','$idCome','$fecha','$idTienda')";
        $respuesta=$conn->query($instruccionsql);
        if(!$respuesta)
        {
            redirect("DetalleTienda.php?idSelec=$idSelec&&err=1");
        }
        else
        {
            redirect("DetalleTienda.php?idSelec=$idSelec");
        }

    }
}