<?php

require_once '../../../config.php';
require_once '../../../src/actions/midia.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$midias = readMidiaAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../../"><h1>Midias - Read</h1></a>
		<a class="btn btn-success text-white" href="./create.php">New</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table">
		<tr>
			<th>CÓDIGO</th>
			<th>NOME</th>
			<th>DATA UPLOAD</th>
			<th>IMOVÉL</th>
			<th>TAG</th>
		</tr>
		<?php foreach($midias as $row): ?>
		<tr>
			<td class="name"><?=htmlspecialchars($row['MidiaID'])?></td>
			<td class="name"><?=htmlspecialchars($row['Nome'])?></td>
			<td class="name"><?=htmlspecialchars(date( 'd/m/Y - H:m' , strtotime($row['DataUpload'])))?></td>
			<td class="name"></td>
			<td class="name">
				<?php 
				$tag = "";
				if ($row['importante'])
				$tag = 'Importante ';
				
				if ($row['urgente'])
				$tag = 'Urgente ';
				
				if ($row['favorito'])
				$tag = 'Favorito';

				echo $tag;
				?>
			</td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Edit</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remove</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

