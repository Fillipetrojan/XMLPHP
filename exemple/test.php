<?php

require("../class/XMLPHP.php");

header("Content-Type: text/xml");

$teste= new XML();



$teste->delete_XML();

$teste->create_XML("Venda");

$xml_texto=$teste->return_XML();



$teste->adicionar_elemento("Produto", "Venda");

$teste->adicionar_elemento("Servico", "Venda");



$teste->adicionar_elemento("Laranja", "Produto");

$teste->adicionar_elemento("Maçã", "Produto");

$teste->adicionar_elemento("Fubá", "Produto");



$teste->adicionar_elemento("Valor", "Laranja");

$teste->adicionar_elemento("Valor", "Maçã");

$teste->adicionar_elemento("Valor", "Fubá");



$teste->adicionar_elemento("Cozinhar", "Servico");

$teste->adicionar_texto("Cozinhar", "File com fritas");


$valor_total=0;

$teste->adicionar_atributo("Valor", "Maçã", "3.45");

$valor_total+=3.45;

$teste->adicionar_atributo("Valor", "Fubá", "12.78");

$valor_total+=12.78;

$teste->adicionar_atributo("ValorTotal", "Produto", $valor_total);

$teste->adicionar_atributo("Venda_Total", "Venda", $valor_total);



$xml_texto=$teste->return_XML();

echo $xml_texto;

$teste->delete_XML();


?>