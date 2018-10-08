<?php
include "parametros.php";
if(isset($_REQUEST))
{
	$txtNombre = (isset($_REQUEST['txtNombre']) ? $_REQUEST['txtNombre']: "");
	$txtClave = password_hash((isset($_REQUEST['txtClave']) ? $_REQUEST['txtClave']:""),PASSWORD_DEFAULT);
	$txtEmpleado_ID = (isset($_REQUEST['txtEmpleado_ID']) ? $_REQUEST['txtEmpleado_ID']: "");
	$UsuarioID = (isset($_REQUEST['id']) ? $_REQUEST['id']: 0);
}
$estado = 0;

if(isset($_REQUEST['btnGuardar']))
{
	if($UsuarioID==0)
	{
		$sqlProceso="INSERT INTO usuarios(nombre , clave, empleado_id)
		VALUES('$txtNombre','$txtClave', '$txtEmpleado_ID')";
	}else{
	$sqlProceso="UPDATE usuarios SET
	nombre='$txtNombre',
	clave='$txtClave'
	WHERE usuario_id = $UsuarioID";
	
	//regresando a su valor de vacio
	$UsuarioID=0;
	}
	
$rsProceso = $bdConexion->consultaSQL($sqlProceso);
//enviando script de almacenamiento correcto
print "<script>alert('Registro almacenado correctamente');</script>";
}

?>

<html>
<head><title>Form prueba</title>
</head>
<link rel="stylesheet" type="text/css" href="estilo.php">
<meta charset="UTF-8">
<body>

<h1 align="center">Formulario de registro</h1>
<form action="" method="POST" class="form-register" autocomplete="off">
<h2 class="form_titulo">CREA UNA CUENTA</h2>
<div class="contenedor-inputs">
<input type="hidden" name="UsuarioID" value="<?=$UsuarioID?>">
<input type="text" name="txtNombre" value="" placeholder="Nombre" class="input-48" required>
<input type="password" name="txtClave" value="" placeholder="Clave" class="input-48" required>
<input type="text" name="txtEmpleado_ID" value="" placeholder="EmpleadoID" class="input-48">
<input type="submit" name="btnGuardar" value="Registrar" class="btn-enviar">
<p class="form_link"><a href="LOGIN_SP1.php">¿Ya tiene una cuenta creada?, entonces retorne al LOGIN PRINCIPAL</a></p>
</div>
</form>
</body>
</html>
