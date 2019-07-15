<?php 

	require_once('../model/modelPessoa.php');
	
	$pessoa = null;

	if(isset($_GET['editar']) && $_GET['editar'] != 0){
		$pessoa = buscaPessoa($_GET['editar'])[0];
		var_dump($pessoa);
	}


	
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

			<?php if($pessoa != null) 
			echo '<div class="form-group">
					<label for="id">Nome</label>
					<input id="id" class="form-control" type="text" name="id" value="'.$pessoa['ID_PESSOA'].'" readonly>
			</div>';?>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input id="nome" class="form-control" type="text" name="nome" value="<?php if($pessoa != null) echo $pessoa['NOME']?>"  required>
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
				<input id="dtnascimento" class="form-control" type="date" name="dtnascimento" value="<?php if($pessoa != null) echo $pessoa['DTNASCIMENTO']?>" required>
			</div>

			<div class="form-group">
				<label for="cpf">CPF</label>
				<input id="cpf" class="form-control" type="text" name="cpf" value="<?php if($pessoa != null) echo $pessoa['CPF']?>" required>
			</div>

			<div class="col-md-offset-8">
				<button class="btn btn-success col-md-4" name="<?php echo ($pessoa != null ? 'editar' : 'salvar')?>">Salvar</button>
				<a href="./index.php" class="btn btn-info col-md-4 col-md-offset-1">Voltar</a>
			</div>
		</form>

	</div>

</body>
</html>
