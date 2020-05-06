<?php

require  './Contato.php';

$contato = new Contato();

//$contato->add('teste@pdoteste.com.br', "Faz Teste");
//$contato->add('outroteste@pdoteste.com.br');

$nome = $contato->getNome("teste@pdoteste.com.br");

echo "Nome: " . $nome;

$lista = $contato->getAll();

echo "<pre>";
var_dump($lista);
echo "</pre>";

//$contato->editar('Lindeberg', "outroteste@pdoteste.com.br");

$contato->excluir("outroteste@pdoteste.com.br");
//$contato->excluir("naoexiste@pdoteste.com.br");

$excluir = $contato->excluir("outroteste@pdoteste.com.br");
