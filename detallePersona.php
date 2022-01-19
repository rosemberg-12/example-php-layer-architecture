<?php
	include_once "php/negocio/Persona.php";

	if(!isset($_GET["nombrePersona"])){
		header("location: index.php?error='No se recibió nombre de la persona a mostrar'");
		return;
	}

	session_start();
	$listaPersonas=$_SESSION["lista_personas"];
	
	if(!isset($listaPersonas)){
		header("location: index.php?error='No se pudo cargar listado de personas'");
		return;
	}
	$personaAMostrar;
	foreach ($listaPersonas as $persona) {
		if($persona->nombre == $_GET["nombrePersona"]){
			$personaAMostrar=$persona;
			break;
		}
	}
	if(!isset($personaAMostrar)){
		header("location: index.php?error='No existe la persona a mostrar'");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalle de la persona</title>
</head>
<body>
	<details>
	  <summary><?php echo $personaAMostrar->nombre?></summary>
	  <p><?php echo $personaAMostrar->nombre." ".$personaAMostrar->apellido;?></p>
	</details>
</body>
</html>