<?php
/**
 * Created by PhpStorm.
 * User: carolina
 * Date: 12/06/17
 * Time: 1:25
 */
require('utils.php');
$conn=conexion();
$idUsu=$_SESSION["idTienda"];
echo $idUsu;
if($_GET and isset($_GET["idDel"]))
{
    if ($_GET["del"]==1)
    {
        if($_GET["idT"]==$idUsu){
        $idSelec=$_GET["idSelec"];
        $idComentario=$_GET["idDel"];
        echo "ingreso al sub";
        //echo $idComentario;
        $instruccionsql="DELETE FROM subcomentario WHERE '$idComentario'=idSubComent";
        $respuestas=$conn->query($instruccionsql);
        /* REALIZAR UNA CONSULTA Y DE AHI CONSULTAR*/
        $instruccionsqlCompS="SELECT * FROM subcomentario WHERE '$idComentario'=idSubComent";
        $comprobar=$conn->query($instruccionsqlCompS);
        if (!$comprobar)
        {
            redirect("DetalleTienda.php?err=2&&idSelec=$idSelec");
        }else
        {
            redirect("DetalleTienda.php?idSelec=$idSelec");
        }
    }else
    {
        $idSelec=$_GET["idSelec"];
        redirect("DetalleTienda.php?err=3&&idSelec=$idSelec");
    }
    }else
    {
        $idSelec=$_GET["idSelec"];
        $idComentario=$_GET["idDel"];
        echo "ingreso al come";
        $instruccionsql="DELETE FROM subcomentario WHERE '$idComentario'=idComentario";
        $instruccionsql1="DELETE FROM comentario WHERE '$idComentario'=idComentario";
        $respuestas=$conn->query($instruccionsql);
        $respuestas=$conn->query($instruccionsql1);
        /* REALIZAR UNA CONSULTA Y DE AHI CONSULTAR*/
        $instruccionsqlCompS="SELECT * FROM subcomentario WHERE '$idComentario'=idComentario";
        $instruccionsqlCompC="SELECT * FROM comentario WHERE '$idComentario'=idComentario";
        $compr1=$conn->query($instruccionsqlCompC);
        $compr2=$conn->query($instruccionsqlCompS);
        if (!$compr1 && !$compr2)
        {
            redirect("DetalleTienda.php?err=2&&idSelec=$idSelec");
        }else
        {
            redirect("DetalleTienda.php?idSelec=$idSelec");
        }
    }

}
