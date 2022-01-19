<?php
		class PersonaController
		{

			function obtenerListadoPersonasSesion(){
				$personaDao= new PersonaDao;
				$listadoSesion=$personaDao->obtenerPersonasSesion();
				return $listadoSesion;
			}

			function obtenerListadoPersonas(){
				$personaDao= new PersonaDao;
				$listadoBitrix=$personaDao->obtenerPersonas();
				$listadoNormalizado= $this->normalizarListadoPersonas($listadoBitrix->result);
				return $listadoNormalizado;
			}

			function registrarPersonas($datosPersonas){
				$personasARegistrar= $this->normalizarPersonasARegistrar($datosPersonas);
				$personaDao= new PersonaDao;
				$exitoso= $personaDao->registrarListadoDePersonas($personasARegistrar);
				return $exitoso;
			}

			private function normalizarPersonasARegistrar($listadoPersonas){
				$listadoNormalizado=array();
				foreach ($listadoPersonas as $personaArray) {
					$persona=new Persona($personaArray[0], $personaArray[1]);
					$listadoNormalizado[]=$persona;
				}
				return $listadoNormalizado;
			}

			private function normalizarListadoPersonas($listadoBitrix){
				$listadoNormalizado=array();
				foreach ($listadoBitrix as $personaBitrix) {
					$persona=new Persona($personaBitrix->n, $personaBitrix->a);
					$listadoNormalizado[]=$persona;
				}
				return $listadoNormalizado;
			}
		}
?>