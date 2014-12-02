<?php

require_once(nusoap.php);
include(conexion.php);
// header('Content-type: application/json');

// function hasCreditEnough($cardNumber, $amount)
// {
// 	return getCredit($cardNumber) >= $amount;
// }

// function getCredit($cardNumber)
// {
// 	$connection = Conectar();
// 	$query = "SELECT credito FROM Tarjeta WHERE numero = '$cardNumber'";
// 	$result = mysqli_query($query);
// 	return mysqli_fetch_assoc($result);
// }

function chargeCredit($cardNumber, $amount)
{
	$connection = Conectar();
	$query = "SELECT credito FROM Tarjeta WHERE numero = '$cardNumber'";
	$result = mysqli_query($query);
	$credito = mysqli_fetch_assoc($result);
	if ($credito < $amount)
	{
		return false;
	}
	else
	{
		$creditoRestante = $credito - $amount;
		$query = "UPDATE Tarjeta SET credito = '$creditoRestante' WHERE numero = '$cardNumber'";
		mysqli_query($query);
		return true;
	}
}

$servidor = new soap_server();
$servidor->configureWSDL("creditserver", "urn:credit");
$servidor->register("chargeCredit",
	array("cardNumber"=>"xsd:integer"),
	array("amount"=>"xsd:decimal"),
	array("return"=>"xsd:string"),
	"urn:credit",
	"urn:credit#chargeCredit",
	"rpc",
	"encoded",
	"Regresar un booleano especificando si se realizó el cargo a la tarjeta.");

if ( !isset( $HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$servidor->service($HTTP_RAW_POST_DATA);

?>