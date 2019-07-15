<?php


require_once('../DB/conectionFactory.php');



function inserePessoa($nome, $sexo, $cpf, $data){

	$conexao = getConnection();

	$sql = "INSERT INTO PESSOA (NOME, SEXO, DTNASCIMENTO, CPF) VALUES (:nome, :sexo, '".$data."', :cpf);";

	$insert = $conexao->prepare($sql);

	$insert->bindValue(':nome', $nome, PDO::PARAM_STR);
	$insert->bindValue(':sexo', $sexo, PDO::PARAM_STR);
	$insert->bindValue(':cpf', $cpf, PDO::PARAM_STR);

	try{

		$insert->execute();

	} catch (PDOException $erro) {

		echo '<br>GET ERRO: '.$erro->getMessage().'<br>';

		return false;
		
	}
	return true;
}


function buscaTodasPessoas(){

	$sql = "SELECT * FROM PESSOA";

	$conexao = getConnection();

	$select = $conexao->prepare($sql);

	try{

		$select->execute();

	} catch (PDOException $erro) {

		$menssagem = array('menssagem' => $erro->getMessage(), 'tipo' => 2);
		return array();
		
	}

	$select = $select->fetchAll(PDO::FETCH_ASSOC);
	
	return $select;
}

?>