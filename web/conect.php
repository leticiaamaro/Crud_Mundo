<?php  
	$host = '127.0.0.1'; //:3307
	$usuario_db = "root"; 
	$senha_db = "";       
	$banco = "bd_mundo";
	$conn = new mysqli($host, $usuario_db, $senha_db, $banco); //criação conexão

	// verificaçõa conexão
	if ($conn->connect_error) {
		die("Erro de conexão: " . $conn->connect_error);
	}
?>
