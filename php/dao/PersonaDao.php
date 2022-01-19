<?php
		/**
		 * Clase que devuelve toda la informacion desde bitrix relacionada con Persona
		 */
		class PersonaDAO
		{
			private $Json='{"result": [{"n": "Pepe","a": "Ruiz","x": "safasf"},{"n": "Piwis","a": "Alfonso","x": "vcvxvcx"}]}';

			//Devuelve el listado de personas no normalizado, basado en la respuesta de Bitrix
			function obtenerPersonas(){
				//Se conecta con Btrix y recibe JSON a decodificar;
				//Aca hago muchas cositas
				$response= $this->Json;
				return json_decode($response);
			}

			function obtenerPersonasSesion(){
				if(isset($_SESSION["lista_personas"]))
					return $_SESSION["lista_personas"];
				else
					return array();
			}

			function registrarListadoDePersonas($listadoDePersonas){
				foreach($listadoDePersonas as $persona){
					$_SESSION["lista_personas"][]=$persona;
				}
				//chun chun chun
				//chun chun chun
				return true;
			}
		}
?>