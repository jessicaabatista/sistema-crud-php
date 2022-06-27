<?php

require_once '../../database/imovel.php';

function findImovelAction($conn, $id) {
	return findImovelDb($conn, $id);
}

function readImovelAction($conn) {
	return readImovelDb($conn);
}

function createImovelAction($conn, $titulo, $descricao, $endereco, $preco) {
	$createImovelDb = createImovelDb($conn, $titulo, $descricao, $endereco, $preco);
	$message = $createImovelDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateImovelAction($conn, $id, $titulo, $descricao, $endereco, $preco) {
	$updateImovelDb = updateImovelDb($conn, $id, $titulo, $descricao, $endereco, $preco);
	$message = $updateImovelDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteImovelAction($conn, $id) {
	$deleteImovelDb = deleteImovelDb($conn, $id);
	$message = $deleteImovelDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
