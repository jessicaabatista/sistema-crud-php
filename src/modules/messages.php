<?php

function printMessage($message) {
    if ($message=='success-create')
        return '<span class="text-success">Cadastro finalizado com sucesso!</span>';
    if ($message=='error-create')
        return '<span class="text-error">Erro ao cadastrar.</span>';

    if ($message=='success-remove')
        return '<span class="text-success">Registro excluido com sucesso!</span>';
    if ($message=='error-remove')
        return '<span class="text-error">Erro ao excluir registro.</span>';

    if ($message=='success-update')
        return '<span class="text-success">Registro atualizado com sucesso!</span>';
    if ($message=='error-update')
        return '<span class="text-error">Erro ao atualizar cadastro.</span>';
}
