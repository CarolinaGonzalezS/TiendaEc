<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 05/06/2017
 * Time: 21:58
 */
echo "REGISTRO";
if($_POST and isset($_POST))
{
    if ($_POST["err"]==1)
    {
        ?>
        <script>
            alert ("Ingrese Valores");
        </script>
        <?php
    }
    elseif ($_POST["err"]==0)
    {
        ?>
        <script>
            alert ("Datos Erroneos");
        </script>
        <?php
    }
}
?>
<link href="estilo.css" rel="stylesheet">


<body>

<div class="container">

    <p>
        <a>
            TiendasEC
        </a>
    </p>
</div>

<form method="post" action="ValInicioSession.php">
<div style="padding: 5px 0 0 320px;">
    <div id="login-box">
        <H2>Login</H2>
        <br />
        <br />
        <div id="label" style="margin-top:20px;">Usuario:</div>
        <div id="login-box-field" style="margin-top:20px;">
            <input name="usuario" class="form-login" value="" size="30" maxlength="2048" id="login-box-field">
        </div>
        <div id="label">Contraseña:</div>
        <div id="login-box-field">
            <input name="clave" id="login-box-field" type="password" class="form-login" value="" size="30" maxlength="2048" />
        <br>
        </div>
        <br>
        <br>

             <u><a href="registroTienda.php" style="margin-left:30px;" id="referencias">Registrarme</a></u>
        <br />
        <br />
        <br>
        <input class="button" type="submit" id="ingresar" name="ingresar" value="Ingresar">
    </div>
</form>
</body>

