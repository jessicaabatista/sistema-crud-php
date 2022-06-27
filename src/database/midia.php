<?php

function findMidiaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	$sql = "SELECT * FROM midia WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$midia = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $midia;
}

function createMidiaDb($conn, $nome, $arquivo, $imovel, $importante, $urgente, $favorito) {
	$nome = mysqli_real_escape_string($conn, $nome);

	if($nome) {
		$sql = "INSERT INTO midia (nome, arquivo, imovel, importante, urgente, favorito) VALUES (?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'sss', $nome, $arquivo, $imovel, $importante, $urgente, $favorito);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readMidiaDb($conn) {
    $midia = [];

	$sql = "SELECT * FROM midia";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$midia = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $midia ;
}

function updateMidiaDb($conn, $id, $nome, $arquivo, $imovel, $importante, $urgente, $favorito) {
    if($id && $nome) {
		$sql = "UPDATE midia SET nome = ?, email = ?, phone = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sssi', $nome, $arquivo, $imovel, $importante, $urgente, $favorito, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteMidiaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM midia WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
