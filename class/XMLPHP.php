<?php


class XML 
{

	private $namexml=null;

	#private $xml;

	private $XML=null;



	function __construct()
	{
		$this->XML =new DOMDocument('1.0', 'UTF-8');

		$this->XML->preserveWhiteSpace=false;

		$this->XML->formatOutput=true;

	}


	private function formatar_DOM()
	{
		$this->XML->preserveWhiteSpace=false;

		$this->XML->formatOutput=true;

	}/// fim function formatar()



	private function formatar_bli()
	{

	} /// fim function formatar()



	#$domtree = new DOMDocument('1.0', 'UTF-8');


	public function create_XML($name)
	{


		if($this->namexml!=null)
		{

			

			$this->namexml=$this->XML->createElement($name, " ");

			$this->XML->appendChild($this->namexml);


			$this->XML->save("../XMLs/arquivo.xml");


			$XML_string=file_get_contents("../XMLs/arquivo.xml");

			# $XML_string=str_replace("> <", ">\n<", $XML_string);

			$arquivo=fopen("../XMLs/arquivo.xml", "wb");

			fwrite($arquivo, $XML_string);


			$this->XML->load('../XMLs/arquivo.xml');

			$this->preserveWhiteSpace = true;

			$this->XML->formatOutput = true;

			#$this->XML->saveXML();

			#echo $this->XML->saveXML();


			
		}else
		{
			unset($this->XML);

			$this->XML =new DOMDocument('1.0', 'UTF-8');

			$this->namexml=$this->XML->createElement($name, " ");

			$this->XML->appendChild($this->namexml);

			$this->XML->save("../XMLs/arquivo.xml");


			$XML_string=file_get_contents("../XMLs/arquivo.xml");

			#$XML_string=str_replace("> <", ">\n<", $XML_string);

			$arquivo=fopen("../XMLs/arquivo.xml", "wb");

			fwrite($arquivo, $XML_string);


			$this->XML->load('../XMLs/arquivo.xml');

			$this->preserveWhiteSpace = true;

			$this->XML->formatOutput = true;

			#$this->XML->saveXML();

			#echo $this->XML->saveXML();

			

		}
		
	}/// fim public function create_XML($name)



	public function adicionar_elemento($name, $Pai)
	{

		$this->XML->save("../XMLs/arquivo.xml");


		$XML_string=file_get_contents("../XMLs/arquivo.xml");


		$validacao=strpos($XML_string, "<$name>");



		$validar_pai=strpos($XML_string, "<$Pai>");


		if($validar_pai===false)
		{
			echo "<br>Elemento Pai não existe<br>";

			return null;
			
		} /// fim else if($validar_pai===false)

		if($validacao===false)
		{
			$XML_string=str_replace("<$Pai>", "<$Pai>\n\t<$name></$name>", $XML_string);

			$XML_string=str_replace("><", "> <", $XML_string);

			

			$XML_string=str_replace("$name> </$name", "$name> </$name", $XML_string);

			$XML_string=str_replace("></$Pai", "> </$Pai", $XML_string);



			

			
	
			$arquivo=fopen("../XMLs/arquivo.xml", "wb");

			fwrite($arquivo, $XML_string);


			$this->XML->load('../XMLs/arquivo.xml');

			$this->preserveWhiteSpace = true;

			$this->XML->formatOutput = true;
				

			#echo $this->XML->saveXML();
		}else /// fim if($validação===false)
		{
			echo "<br>Elemento já existe";

			return null;
		} 

			

			#echo $XML_string;

	} /// fim public function adicionar_elemento($name, $pai)



	public function delete_XML()
	{
		unset($this->XML);
	}



	public function return_XML()
	{
		return $this->XML->saveXML();
		
	}



}# fim class XML


?>