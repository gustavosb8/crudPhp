<?php

if(!isset($_SESSION['mensagem'])){
	session_start();
}

require_once('../model/modelPessoa.php');


if(isset($_POST['salvar'])){

	$pontos = array(",", ".", "-");


	$nome =  $_POST['nome'];
	$sexo =  $_POST['sexo'];
	$cpf  =  str_replace($pontos, "", $_POST['cpf']);
	$data =	 $_POST['dtnascimento'];

	echo 'CPF SEM TRATRA: '.$_POST['cpf'].'<br>';
	echo 'CPF TRATRADO: '.$cpf.'<br>';
	echo 'DATA: '.$data;

	if(salvarPessoa($nome, $sexo, $cpf, $data)){
		$_SESSION['mensagem'][0] = '1';
		$_SESSION['mensagem'][1] = 'Cadastro realizado com sucesso';
	}else{
		$_SESSION['mensagem'][0] = '2';
		$_SESSION['mensagem'][1] = 'Cadastro não realizado';
	}
	header('Location: ../view/index.php'); 
}

?>