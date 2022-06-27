<?php

require_once '../../../config.php';
require_once '../../../src/actions/imovel.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$imoveis = readImovelAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../../"><h1>Imovéis - Read</h1></a>
		<a class="btn btn-success text-white" href="./create.php">New</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table">
		<tr>
			<th>CÓDIGO</th>
			<th>TÍTULO</th>
			<th>DESCRIÇÃO</th>
			<th>ENDEREÇO</th>
			<th>PREÇO</th>
			<th>DATA DE CADASTRO</th>
		</tr>
		<?php foreach($imoveis as $row): ?>
		<tr>
			<td class="name"><?=htmlspecialchars($row['ImovelID'])?></td>
			<td class="name"><?=htmlspecialchars($row['Titulo'])?></td>
			<td class="name"><?=htmlspecialchars($row['Descricao'])?></td>
			<td class="name"><?=htmlspecialchars($row['Endereco'])?></td>
			<td class="name"><?=htmlspecialchars($row['Preco'])?></td>
			<td class="name"><?=htmlspecialchars(date( 'd/m/Y - H:m' , strtotime($row['DataCadastro'])))?></td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['ImovelID']?>">Edit</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['ImovelID']?>">Remove</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

