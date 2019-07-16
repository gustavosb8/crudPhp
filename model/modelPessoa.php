<?php 

require_once('../consultas/pessoa.php');

function salvarPessoa($nome, $sexo, $cpf, $data){
	return inserePessoa($nome, $sexo, $cpf, $data);
}

function editaPessoa($id, $nome, $sexo, $cpf, $data){
	return alteraPessoa($id, $nome, $sexo, $cpf, $data);
}

function excluiPessoa($id){
	return removePessoa($id);
}

function buscaPessoa($id){
	return buscaPessoaPorID($id);
}

function buscaPessoas(){
	return buscaTodasPessoas();
}


?>