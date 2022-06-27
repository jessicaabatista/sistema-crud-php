<?php

require_once '../../../config.php';
require_once '../partials/header.php';

?>
<div class="container">
    <div class="row">
        <a href="../../../index.php">
            <h1>Mídias - Create</h1>
        </a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../actions/recebe_upload.php" method="POST">
                <label>Nome</label>
                <input type="text" name="nome" required />
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
                <label>Arquivo:</label>
                <input type="file" name="arquivo" required />

                <button class="btn btn-success text-white" type="submit">Confirmar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>