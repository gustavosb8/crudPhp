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

	if(salvarPessoa($nome, $sexo, $cpf, $data)){
		atualizaMensagem('1', 'Cadastro realizado com sucesso');
	}else{
		atualizaMensagem('2', 'Cadastro não realizado');
	}
	redirect();
}

if(isset($_POST['editar'])){

	$pontos = array(",", ".", "-");

	$id   =  $_POST['id'];
	$nome =  $_POST['nome'];
	$sexo =  $_POST['sexo'];
	$cpf  =  str_replace($pontos, "", $_POST['cpf']);
	$data =	 $_POST['dtnascimento'];

	if(editaPessoa($id, $nome, $sexo, $cpf, $data)){
		atualizaMensagem('1', 'Registro editado com sucesso');
	}else{
		atualizaMensagem('2', 'Registro não editado');
	}
	redirect();
}

if(isset($_GET['excluir'])){

	$id   =  $_GET['excluir'];

	if(excluiPessoa($id)){
		atualizaMensagem('1', 'Registro removido com sucesso');
	}else{
		atualizaMensagem('2', 'Registro não removido');
	}
	redirect();
}

function atualizaMensagem($tipo, $mensagem){
	$_SESSION['mensagem'][0] = $tipo;
	$_SESSION['mensagem'][1] = $mensagem;
}

function redirect(){
	header('Location: ../view/lista.php'); 
}

?>