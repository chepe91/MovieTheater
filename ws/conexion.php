<?php 

//definimos paramaetros de conexion
define('MYSQLSERVER', 'localhost');
define('MYSQLUSERNAME', 'root');
define('MYSQLSPASSWORD', '');
define('MYSQLDATABASE', 'MovieTheater');


//Conectamos a la base de datos
function Conectar(){

//Validacion de conexion y error de conexion
	if (!($link = mysqli_connect(MYSQLSERVER,MYSQLUSERNAME,MYSQLSPASSWORD)))
		{ echo "Se produjo un Error en la conexion a la base de datos.
		".mysql_error();
			exit();
		}


//Validacion de conexion y errror de la Base de datos

	if (!($db = mysqli_select_db($link,MYSQLDATABASE))){
		echo "Se produjo un error seleccionando la base de datos.
		".mysqli_error();
		exit();

		}	


	mysqli_query($link,"SET NAMES 'utf8'");
	return $link;	
}

 ?>