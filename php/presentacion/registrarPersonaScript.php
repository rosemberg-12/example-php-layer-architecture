<?php
        include_once "../negocio/Persona.php";
        include_once "../negocio/PersonaController.php";
        include_once "../dao/PersonaDao.php";
        session_start();
        $nombres= $_POST['nombre'];
        $apellidos=$_POST['apellido'];

        $datosPersona=array();

        for ($i=0; $i< count($nombres); $i++){
            $nombre=$nombres[$i];
            $apellido=$apellidos[$i];
            $datosPersona[]=array($nombre,$apellido);
        }

        $controller= new PersonaController;

        $registrado= $controller->registrarPersonas($datosPersona);

        if($registrado == true){
            header("Location: ../../index.php");
        }else{
            header("Location: ../../index.php?error='No se pudo registrar nada'");
        }

?>