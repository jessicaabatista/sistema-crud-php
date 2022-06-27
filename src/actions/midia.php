<?php

require_once '../../database/midia.php';

function findMidiaAction($conn, $id) {
	return findMidiaDb($conn, $id);
}

function readMidiaAction($conn) {
	return readMidiaDb($conn);
}

function createMidiaAction($conn, $nome, $arquivo, $imovel, $importante, $urgente, $favorito) {
	$createMidiaDb = createMidiaDb($conn, $nome, $arquivo, $imovel, $importante, $urgente, $favorito);
	$message = $createMidiaDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateMidiaAction($conn, $id, $nome, $arquivo, $imovel, $importante, $urgente, $favorito) {
	$updateMidiaDb = updateMidiaDb($conn, $id, $nome, $arquivo, $imovel, $importante, $urgente, $favorito);
	$message = $updateMidiaDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteMidiaAction($conn, $id) {
	$deleteMidiaDb = deleteMidiaDb($conn, $id);
	$message = $deleteMidiaDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
