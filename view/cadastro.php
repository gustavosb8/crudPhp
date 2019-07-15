<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



	<?php require_once('../imports/bootstrap.php') ?>

	<title>Teste Gustavo</title>
</head>
<body class="container">
	<div class="col-md-10 col-md-offset-1">

		<h2>Cadastro de Pessoas</h2>

		<form action="../controller/controller.php" method="POST">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input id="nome" class="form-control" type="text" name="nome" required>
			</div>

			<div class="form-group">
				<label for="sexo">Sexo</label>
				<select class="form-control" id="sexo" name="sexo" required>
					<option value="M">MASCULINO</option>
					<option value="F">FEMENINO</option>
				</select>
			</div>

			<div class="form-group">
				<label for="dtnascimento">Data de Nascimento</label>
				<input id="dtnascimento" class="form-control" type="date" name="dtnascimento" required>
			</div>

			<div class="form-group">
				<label for="cpf">CPF</label>
				<input id="cpf" class="form-control" type="text" name="cpf" required>
			</div>

			<div class="col-md-offset-8">
				<button class="btn btn-success col-md-4" name="salvar">Salvar</button>
				<a href="./index.php" class="btn btn-info col-md-4 col-md-offset-1">Voltar</a>
			</div>
		</form>

	</div>

</body>
</html>
