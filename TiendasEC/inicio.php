<?php
/**
 * Created by PhpStorm.
 * User: 22A
 * Date: 06/06/2017
 * Time: 18:22
 */
require ('utils.php');

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="estilo.css" rel="stylesheet">
<div align="right">
    <a href="CerrarSesion.php" style="text-align: right"><img src="imagenes/cerrar_sesion.png" width="200" height="50" style="margin-left:90px;" /></a>
</div>

<div class="container">
    <p><a>
            <?php
            echo "Bienvenid@ ".$_SESSION['usuario']['usuario'];
            ?>
        </a></p>
</div>

<?php
$conn=conexion();
$instruccionsql="SELECT * FROM tienda";
$res=$conn->query($instruccionsql);

?>
<div align="center">
<table class="table table-condensed" width="1000">
    <thead class="tituloT">
    <tr>
        <th>Tiendas Existentes
            <br>
            <u>Selecciona una tienda</u>
            <br>
            <br>
        </th>

    </tr>
    </thead>
    <?php if($res->num_rows > 0) : ?>
    <?php while($row = $res->fetch_assoc()) : ?>
    <tbody>
            <tr>
                <td class="active" style="text-align: center;"><h2><a class="tiendas" href="DetalleTienda.php?idSelec=<?php
                        echo $row['id']
                        ?>"><?php echo $row['nombreTienda'] ?></a></h2></td>
            </tr>
    </tbody>
        <?php endwhile; ?>
    <?php endif; ?>
</table>
</div>
