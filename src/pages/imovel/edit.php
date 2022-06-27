<?php

require_once '../../../config.php';
require_once '../../actions/imovel.php';
require_once '../partials/header.php';

if (isset($_POST["ImovelID"], $_POST["titulo"]) && isset($_POST["descricao"]) && isset($_POST["endereco"]) && isset($_POST["preco"]))
    updateImovelAction($conn, $_POST["ImovelID"], $_POST["titulo"], $_POST["descricao"], $_POST["endereco"], $_POST["preco"]);

$imovel = findImovelAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Imovéis - Edit</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/imovel/edit.php" method="POST">
                <input type="hidden" name="ImovelID" value="<?=$imovel['ImovelID']?>" required/>
                <label>Título</label>
                <input type="text" name="titulo" value="<?=htmlspecialchars($imovel['Titulo'])?>" required/>
                <label>Descrição</label>
                <input type="text" name="descricao" value="<?=htmlspecialchars($imovel['Descricao'])?>" required/>
                <label>Endereço</label>
                <input type="text" name="endereco" value="<?=htmlspecialchars($imovel['Endereco'])?>" required/>
                <label>Preço</label>
                <input type="text" name="preco" value="<?=htmlspecialchars($imovel['Preco'])?>" required/>

                <button class="btn btn-success text-white" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

