<?php 

if(!isset($_SESSION['mensagem'])){
	session_start();
}

require_once('../model/modelPessoa.php');

$pessoas = buscaPessoas();

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
	<div  class="col-md-10 col-md-offset-1">

		<?php

			if(isset($_SESSION['mensagem'])){
				if($_SESSION['mensagem'][0]){
					echo '<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							'.$_SESSION['mensagem'][1].'
						  </div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissible">
						  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							'.$_SESSION['mensagem'][1].'
						  </div>';
				}
				$_SESSION['mensagem'] = null;
			}
		?>

		<h2>Lista de Pessoas</h2>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">Sexo</th>
					<th scope="col">CPF</th>
					<th scope="col">Data Nascimento</th>
					<th scope="col">Acões</th>
				</tr>
			</thead>
			<tbody>
				

				<?php
				foreach ($pessoas as $pessoa) {
					echo '<tr>';
					echo '<td scope="row">'.$pessoa['ID_PESSOA'].'</td>';
					echo '<td>'.$pessoa['NOME'].'</td>';
					if($pessoa['SEXO'] == 'F'){
						echo '<td>FEMENINO</td>';
					}else{
						echo '<td>MASCULINO</td>';
					}
					echo '<td>'.$pessoa['CPF'].'</td>';
					echo '<td>'. date('d-m-Y', strtotime($pessoa['DTNASCIMENTO'])).'</td>';
					echo '
					<td>
					<div>
					
						<a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="#" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span></a>
					
					</div>
					</td>';
					echo '</tr>';
				}
				?>
				
				
			</tbody>
		</table>

		<a href="./cadastro.php" class="btn btn-success">
          <span class="glyphicon glyphicon-plus"></span> Novo 
        </a>

	</div>

</body>
</html>

