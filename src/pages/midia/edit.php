<?php

require_once '../../../config.php';
require_once '../../actions/midia.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["nome"]))
    updateMidiaAction($conn, $_POST["nome"], $_POST["arquivo"], $_POST["id"], $_POST["imovel"], $_POST["importante"], $_POST["urgente"], $_POST["favorito"]);

$midia = findMidiaAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Midias - Edit</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/midia/edit.php" method="POST">
                <label>Nome</label>
                <input type="text" name="nome" value="<?=htmlspecialchars($midia['Nome'])?>" required />
                <label>Imovél</label>
                <select name="imovel">
                    <option value="0" selected hidden>-------------</option>
                </select>
                <br>
                <label>TAG's</label>
                <fieldset>
                    <div>
                        <input type="checkbox" id="importante" name="importante">
                        <label for="importante">Importante</label>
                    </div>
                    <div>
                        <input type="checkbox" id="urgente" name="urgente">
                        <label for="urgente">Urgente</label>
                    </div>
                    <div>
                        <input type="checkbox" id="favorito" name="favorito">
                        <label for="favorito">Favorito</label>
                    </div>
                </fieldset>
                <br>

                <button class="btn btn-success text-white" type="submit">Confirmar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

