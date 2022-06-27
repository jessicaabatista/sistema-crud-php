<?php

require_once '../../../config.php';
require_once '../../actions/imovel.php';
require_once '../partials/header.php';

if (isset($_POST["titulo"]) && isset($_POST["descricao"]) && isset($_POST["endereco"]) && isset($_POST["preco"]))
    createImovelAction($conn, $_POST["titulo"], $_POST["descricao"], $_POST["endereco"], $_POST["preco"]);
?>

<div class="container">
    <div class="row">
        <a href="../../../index.php">
            <h1>Imovéis - Create</h1>
        </a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../imovel/create.php" method="POST">
                <label>Título</label>
                <input type="text" name="titulo" required />
                <label>Descrição</label>
                <input type="text" name="descricao" required />
                <label>Endereço</label>
                <input type="text" name="endereco" required />
                <label>Preço</label>
                <input type="text" name="preco" required />

                <button class="btn btn-success text-white" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>