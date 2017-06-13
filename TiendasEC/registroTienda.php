<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 05/06/2017
 * Time: 20:19
 */
session_start();
if(isset($_REQUEST["error"]))
{
    $_SESSION["error"]=$_REQUEST["error"];
    if($_SESSION["error"]==0)
    {
        echo "ERROR AL INGRESAR";
    }elseif ($_SESSION["error"]==2)
    {
        echo '<h3>';
        echo '<div style="text-align: center;">';
        echo '<span style="color: blue; ">';
        echo "LAS CLAVES NO COINSIDEN";
        echo '</span>';
        echo '</div>';
        echo '</h3>';
    }

}
?>

<link href="estiloRegistro.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
    <h1>Registro</h1>

    <form method="post" action="validarTienda.php">

        <hr>
        <label id="icon" for="tienda"><i class="icon-envelope "></i></label>
        <input type="text" name="tienda" id="name" placeholder="Tienda" required/>
        <label id="icon" for="usuario"><i class="icon-user"></i></label>
        <input type="text" name="usuario" id="name" placeholder="Usuario" required/>
        <label id="icon" for="clave1"><i class="icon-shield"></i></label>
        <input type="password" name="clave1" id="name" placeholder="Password" required/>
        <label id="icon" for="clave2"><i class="icon-shield"></i></label>
        <input type="password" name="clave2" id="name" placeholder="Repetir Password" required/>
        <input type="submit" name="registrar" id="registrar" value="REGISTRAR" class="button">
    </form>
</div>

<form method="post" action="validarTienda.php.php">

</form>
