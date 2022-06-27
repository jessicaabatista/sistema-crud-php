<?php

function findImovelDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	$sql = "SELECT * FROM Imovel WHERE ImovelID = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$imovel = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $imovel;
}

function createImovelDb($conn, $titulo, $descricao, $endereco, $preco) {
	$titulo = mysqli_real_escape_string($conn, $titulo);
	$descricao = mysqli_real_escape_string($conn,  $descricao);
	$endereco = mysqli_real_escape_string($conn,  $endereco);
	$preco = mysqli_real_escape_string($conn,  $preco);
	$data = date('Y/m/d H:i:s');
	
	if ($titulo && $descricao && $endereco) {
		$sql = "INSERT INTO Imovel (Titulo, Descricao, Endereco, Preco, DataCadastro) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'sssss', $titulo, $descricao, $endereco, $preco, $data);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readImovelDb($conn) {
    $imoveis = [];

	$sql = "SELECT * FROM Imovel";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if ($result_check > 0)
		$imoveis = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $imoveis;
}

function updateImovelDb($conn, $id, $titulo, $descricao, $endereco, $preco) {
    if ($id && $titulo && $descricao && $endereco) {
		$sql = "UPDATE Imovel SET Titulo = ?, Descricao = ?, Endereco = ?, Preco = ? WHERE ImovelID = ?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'ssssi', $titulo, $descricao, $endereco, $preco, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteImovelDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if ($id) {
		$sql = "DELETE FROM Imovel WHERE ImovelID = ?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
