<?

	include_once "php/negocio/Persona.php";
	include_once "php/negocio/PersonaController.php";
	include_once "php/dao/PersonaDao.php";
	
	if(isset($_GET["error"])){
		$showError=true;
		$erroMessage=$_GET["error"];
	}	
	session_start();
	$personaController= new PersonaController;
	$listaPersonas=$personaController->obtenerListadoPersonas();

	$_SESSION["lista_personas"]=$listaPersonas;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php if (isset($showError) && $showError): ?>
	<script type="text/javascript">alert(<?php echo ($erroMessage); ?>);</script>
<?php endif; ?>
<body>
	<?php foreach ($listaPersonas as $persona):?>
		<a href=<?php echo "detallePersona.php?nombrePersona=".$persona->nombre;?>>
			<?php echo $persona->nombre;?>
		</a>
		<br>
	<?php endforeach;?>
	<br>
	<a href="registrarPersona.php">Registrar Personas</a>
</body>
</html>						