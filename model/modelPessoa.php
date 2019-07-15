<?php 

require_once('../consultas/pessoa.php');


function salvarPessoa($nome, $sexo, $cpf, $data){
	return inserePessoa($nome, $sexo, $cpf, $data);
}

function editaPessoa(){
	return alteraPessoa();
}

function excluiPessoa(){
	return removePessoa();
}

function buscaPessoas(){
	return buscaTodasPessoas();
}
?>