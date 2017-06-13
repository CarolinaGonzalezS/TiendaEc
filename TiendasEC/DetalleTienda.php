<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 05/06/2017
 * Time: 22:28
 */
require ('utils.php');

if(isset($_REQUEST["regis"]))
{
    $_SESSION["regis"]=$_REQUEST["regis"];
    if($_SESSION["regis"]==1)
    {
        ?>
        <script>
            alert ("Registro Exitoso");
        </script>
        <?php
    }
}
if(isset($_GET["err"]))
{
    if ($_GET["err"]==1)
    {
        ?>
        <script>
            alert ("El comentario no se ingreso intentelo mas tarde");
        </script>
        <?php
    }
    elseif ($_GET["err"]==2)
    {
        ?>
        <script>
            alert ("No se puede eliminar el comentario intentalo mas tarde");
        </script>
        <?php
    }
    elseif ($_GET["err"]==3)
    {
        ?>
        <script>
            alert ("No se puede eliminar un comentario que no es suyo");
        </script>
        <?php
    }
}
$conn=conexion();
$idTienda=$_SESSION["idTienda"];
$idSeleccion=$_GET["idSelec"];
$instruccionsql="SELECT * FROM tienda WHERE id='$idSeleccion'";
$respuesta=$conn->query($instruccionsql);
while ($row=$respuesta->fetch_assoc()):
?>
<table  style="border-bottom:10px solid white">
    <thead>
    <tr>
        <td>
                <a href="inicio.php" style="text-align: left"><img src="imagenes/home.png" width="200" height="100" style="margin-left:90px;" /></a>
        </td>
        <td width="900">
            <div align="right" >
                <a href="CerrarSesion.php" style="text-align: right"><img src="imagenes/cerrar_sesion.png" width="200" height="50" style="margin-left:90px;" /></a>
            </div>
        </td>
    </tr>
    </thead>
</table>
<link href="estilo.css" rel="stylesheet">
<body>

<table>
    <thead>
    <tr>
        <th><img style="text-align: center" width="300" height="150" src="imagenes/tienda.jpg"></th>
        <th width="800" height="100" style="background: padding-box"><h1>
                <div class="container">

                    <p><a>
                            <?php
                            echo $row["nombreTienda"];
                            ?>
                        </a></p>
                </div>

            </h1>
        </th>
    </tr>
    </thead>
</table>

<?php
endwhile;
$instruccionsql="SELECT * FROM producto WHERE id='$idSeleccion'";
$respuesta=$conn->query($instruccionsql);
?>
<?php if($respuesta->num_rows > 0) { ?>
<table border="1">
    <thead>
        <tr>
            <th class="produc">Codigo</th>
            <th class="produc">Nombre</th>
            <th class="produc">Tipo</th>
            <th class="produc">Cantidad</th>
            <th class="produc">Precio</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php while($row = $respuesta->fetch_assoc()){ ?>

                <td class="productos"><?php echo $row['idProducto'] ?></td>
                <td class="productos"><?php echo $row['nombre'] ?></td>
                <td class="productos"><?php echo $row['tipo'] ?></td>
                <td class="productos"><?php echo $row['cantidad'] ?></td>
                <td class="productos"><?php echo $row['precio'] ?></td>

        <?php } ?>
    <?php
    }else
    {
    ?>
        <div style="text-align: center;"><img width="300" height="300" src="imagenes/NoRegistro.jpg"></div>
    <?php }
    ?>
    </tr>
    </tbody>
</table>
<?php
if ($idSeleccion==$idTienda){
?>
    <form action="nuevo_producto.php" method="post">
    <br>
    <div align="center">

        <input class="button" type="submit" name="registrar" value="Registrar Producto" id="registrar"></div>
    </form>

<?php
}
?>
<br>
<br>
<form method="post" action="ValidarComentario.php?type=1&&idS=<?php echo $idSeleccion ?>">
        <h1 style="color: blanchedalmond">Comentarios</h1>
        <textarea class="textComen" name="comentario" id="comentario" style="text-align:left"></textarea>
    <div class="comment-submit">
        <br>
        <input class="button" type="submit" id="comentar" name="comentar" value="Publicar">
        <br>
        <br>
    </div>
</form>
<?php
$instruccionsql="SELECT * FROM comentario WHERE '$idSeleccion'=idTienda";
$respuesta=$conn->query($instruccionsql);
if ($respuesta->num_rows>0)
{
    while ($row=$respuesta->fetch_assoc())
{
?>
<div>
    <?php
    $idUsu = $row["id"];
    $instruccionsql = "SELECT * FROM tienda WHERE '$idUsu'=id";
    $res = $conn->query($instruccionsql);
    if ($res->num_rows > 0) {
        while ($row1 = $res->fetch_assoc()) {
            $nomUsu = $row1["usuario"];
        }
    }
    //comentarios
    ?>
</div>
    <form method="post" action="DetalleTienda.php?idSelec=<?php echo $idSeleccion?>">
        <table class="marcar">
            <thead>
            <tr>
                 <div style="color: white"><a name="post1203413"><img title="Antiguo" class="inlineimg" src="http://static.forosdelweb.com/fdwtheme/images/statusicon/post_old.gif" alt="Antiguo" border="0"><?php echo " ".$row["fecha"];?></a></div>
                <td class="foto">
                    <div align="center"><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png"
                                     alt="Usuario" width="50" height="50">
                    </div>
                </td>
                <td class="usuario">
                    <a style="color: fuchsia" class="loginModalBox"
                       href="DetalleTienda.php?idSelec=<?php echo $idTienda ?>">
                        <h1>
                            <?php echo $nomUsu ?>
                        </h1>
                    </a>
                </td>
                <td class="blanco"></td>
                <td class="info" valign="top" nowrap="nowrap">
                    <div class="smallfont">
                        <div>
                            <?php echo "Fecha de publicacion: ".$row["fecha"];
                            ?>
                        </div>
                        <div>
                            <?php echo "Numero de comentario: "?>
                            <input class="numCom" type="text" name="coment" id="coment" value="<?php echo $row["idComentario"];
                            ?>">

                        </div>
                    </div>
                </td>
            </tr>
            </thead>
            <tbody>
            <table class="marcar">
                <thead>
                <tr>
                    <td class="comentario">
                        <div align="center">
                            <textarea style="text-align:left" class="textComen" disabled="True">
                            <?php echo $row["descripcion"];
                            ?>
                            </textarea>
                        </div>
                    </td>
                </tr>
                </thead>
            </table>
            </tbody>
            <tbody>
                <tr>
                    <td>

                    </td>
                    <td>
                        <?php
                        //subcomentario
                        $comentario=$row["idComentario"];
                        $instruccionsql="SELECT * FROM subcomentario WHERE idComentario='$comentario'";
                        $resComen=$conn->query($instruccionsql);
                        ?>
                        <h1 style="color: darksalmon">¿QUIERES OPINAR?</h1>
                        <img src="imagenes/flecha.png">
                        <?php
                        if ($resComen->num_rows>0)
                        {

                            while ($reco = $resComen->fetch_assoc())
                            {
                                $idComT=$reco["idTienda"];
                                $comDesc=$reco["descripcion"];
                                $comFech=$reco["fecha"];
                                $idSubcom=$reco["idSubComent"];
                                ?>
                                <div>
                                    <?php
                                    $instruccionsql = "SELECT * FROM tienda WHERE '$idComT'=id";
                                    $usuResp = $conn->query($instruccionsql);
                                    if ($usuResp->num_rows > 0) {
                                        while ($recUsu = $usuResp->fetch_assoc()) {
                                            $nomUsua = $recUsu["usuario"];
                                        }
                                    }
                                    ?>
                                    <ul>
                                        <li>
                                          <table class="marcarSubC">
                                        <thead>
                                        <tr>
                                             <div style="color: white"><a name="post1203413"><img title="Antiguo" class="inlineimg" src="http://static.forosdelweb.com/fdwtheme/images/statusicon/post_old.gif" alt="Antiguo" border="0"><?php echo " ".$comFech;?></a></div>
                                                <td class="Subfoto">
                                                    <div align="center"><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png"
                                                                             alt="Usuario" width="50" height="50">
                                                    </div>
                                                </td>
                                                <td class="Subusuario">
                                                    <a style="color: fuchsia" class="loginModalBox"
                                                       href="DetalleTienda.php?idSelec=<?php echo $idTienda ?>">
                                                        <h1>
                                                            <?php echo $nomUsua ?>
                                                        </h1>
                                                    </a>
                                                </td>
                                                <td class="Subblanco"></td>
                                                <td class="Subinfo" valign="top" nowrap="nowrap">
                                                        <div>
                                                            <div align="right"><a href="eliminar.php?del=1&&idDel=<?php echo $idSubcom?>&&idSelec=<?php echo $idSeleccion?>&&idT=<?php echo $idComT?>"><img width="35" height="35" src="imagenes/cerrar.jpg"></a></div>
                                                            <?php
                                                            echo "Fecha de publicacion: ".$comFech;
                                                            ?>
                                                        </div>
                                                        <div>
                                                            <?php echo "Numero de comentario: $idSubcom"?>


                                                        </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <table class="marcarSubC">
                                            <thead>
                                            <tr>
                                                <td class="subcomentario">
                                                        <textarea class="textSub" style="text-align:left" disabled="True">
                                                        <?php echo $comDesc;
                                                        ?>
                                                        </textarea>
                                                </td>
                                            </tr>
                                            </thead>
                                        </table>
                                        </tbody>
                                    </table>
                                    </li>
                                    </ul>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
            <tbody>
            <table class="marcar">
                <thead>
                <tr>
                    <td class="comentario">
                        <br>
                        <input class="button" type="submit" id="recomentar" name="recomentar" value="RESPONDER">
                        <br>
    </form>
                    <?php
                    if ($_POST and isset($_POST["recomentar"]))
                    {
                        $idCom=$_POST["coment"]
                        ?>

                        <form method="post" action="ValidarComentario.php?type=2&&idC=<?php echo $idCom?>&&idSelec=<?php echo $idSeleccion?>">
                        <br>
                        <textarea class="textComen" style="background-color: blanchedalmond" rows="30" cols="10" name="comentar" id="comentar" >

                        </textarea>
                        <input class="button" type="submit" value="Publicar" name="publicar" id="publicar">
                        </form>
                        <?php
                    }
                    if($row["id"]==$idTienda)
                    {
                        ?>
                        <br>
                        <div class="container">

                            <p>
                                <a class="eliminar" href="eliminar.php?idDel=<?php echo $row["idComentario"]?>&&idSelec=<?php echo $idSeleccion?>">Eliminar Comentario
                                </a>
                            </p>
                        </div>
                        <div align="center"></div>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            </thead>
        </table>
        </tbody>
    </table>
    <br>
    <br>
</body>
<?php
}
}




