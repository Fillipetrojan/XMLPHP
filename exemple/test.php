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

$teste->adicionar_elemento("Cozinhar", "Servico");

$xml_texto=$teste->return_XML();


echo $xml_texto;


$teste->delete_XML();

?>