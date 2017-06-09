<?php 
$servidor="10.2.110.81";
$bd="wearweather";
$user="dolly";
$pass="password";


$link=mysql_connect($servidor,$user,$pass) or die (mysql_error());
$db=mysql_select_db($bd) or die (mysql_error());

// function coneccao(){
	// $ligacao = mysqli_connect($servidor,$user, $pass);
// mysqli_select_db($ligacao,$bd);
// }

function ligacao_bd() {
	$ligacao = mysqli_connect($servidor, $user, $pass, $bd);
	return $ligacao;
}
		
?>