<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 05/06/2017
 * Time: 22:29
 */
session_start();
if(isset($_GET["error"]))
{
    if($_GET["error"]==0)
    {?>
        <script>
    alert ("ERROR AL REGISTRAR");
        </script>
        <?php
    }elseif($_GET["error"]==1)
    {?>
        <script>
    alert ("CODIGO REPETIDO");
        </script>
    <?php
    }
}
?>
<link href="estilo.css" rel="stylesheet">
<div align="right"><a href="CerrarSesion.php"><img src="imagenes/cerrar_sesion.png" width="200" height="50" style="margin-left:90px;" /></a></div>
<div style="text-align: center;">
    <span style="color: red; "><h1 >Bienvenido a registro de producto</h1></span>
    <span style="color: fuchsia; "><h2>Por favor ingrese todos los datos</h2></span>
<form method="post" action="ValProducto.php?id=<?php echo $id?>">
    <label for="codigo" style="color: white">Codigo: </label>
    <input type="text" name="codigo" id="codigo">
    <br>
    <br>
    <label for="nombre" style="color: white">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <br>
    <label for="tipo" style="color: white">Tipo: </label>
    <select name="tipo" id="tipo">
        <option value="Vestimenta">Vestimenta</option>
        <option value="Salud">Salud</option>
        <option value="Alimento">Alimento</option>
    </select>
    <br>
    <br>
    <label for="cantidad" style="color: white">Cantidad:</label>
    <input type="text" name="cantidad" id="cantidad">
    <br>
    <br>
    <label for="precio" style="color: white">Precio:</label>
    <input type="text" name="precio" id="precio">
    <br>
    <br>
    <input type="submit" name="ingresar" id="ingresar" value="Insertar Producto">
</form>
</div>