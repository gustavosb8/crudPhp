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

function alteraPessoa($id, $nome, $sexo, $cpf, $data){
	
	$conexao = getConnection();

	$sql = "UPDATE PESSOA SET NOME = :nome, SEXO = :sexo, DTNASCIMENTO = '".$data."', CPF = :cpf WHERE ID_PESSOA = :id";

	$editar = $conexao->prepare($sql);

	$editar->bindValue(':id', $id, PDO::PARAM_INT);
	$editar->bindValue(':nome', $nome, PDO::PARAM_STR);
	$editar->bindValue(':sexo', $sexo, PDO::PARAM_STR);
	$editar->bindValue(':cpf', $cpf, PDO::PARAM_STR);

	try{

		$editar->execute();

	} catch (PDOException $erro) {

		echo '<br>GET ERRO: '.$erro->getMessage().'<br>';

		return false;
		
	}
	return true;

}

function removePessoa($id){
	
	$conexao = getConnection();

	$sql = "DELETE FROM PESSOA WHERE ID_PESSOA = :id";

	$excluir = $conexao->prepare($sql);

	$excluir->bindValue(':id', $id, PDO::PARAM_INT);

	try{

		$excluir->execute();

	} catch (PDOException $erro) {

		echo '<br>GET ERRO: '.$erro->getMessage().'<br>';

		return false;
		
	}
	return true;

}

function buscaPessoaPorID($id){

	$conexao = getConnection();

	$sql = "SELECT * FROM PESSOA PES WHERE PES.ID_PESSOA = ".$id;

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