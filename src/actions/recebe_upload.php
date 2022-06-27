<?php

require_once '../actions/midia.php';

$_UP['pasta'] = '../uploads/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
} else {
    $nome_final = $_FILES['arquivo']['name'];

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        echo "Upload efetuado com sucesso!";
        echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
    } else {
        echo "Não foi possível enviar o arquivo, tente novamente";
    }
}

createMidiaAction($conn, $_POST["nome"], $_UP['pasta'] . $nome_final, $_POST["imovel"], $_POST["importante"], $_POST["urgente"], $_POST["favorito"]);
