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


	public function carregar_XML_file()
	{

		$this->XML->load('../XMLs/arquivo.xml');

		$this->preserveWhiteSpace = true;

		$this->XML->formatOutput = true;
				
		$this->XML->saveXML();

	}/// fim carregar_XML_file()


	//===========================================
	//==================ESTRUTURA================
	//===========================================



		//=============================
		// CRIAR

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


					$this->carregar_XML_file();
			
				}else /// if($this->namexml!=null)
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


					$this->carregar_XML_file();

				} /// fim else if($this->namexml!=null)
				
			}/// fim public function create_XML($name)


			
			public function adicionar_elemento($name, $Pai)
			{

				$this->XML->save("../XMLs/arquivo.xml");


				$XML_string=file_get_contents("../XMLs/arquivo.xml");


				$pai_l=strlen($Pai);


				$inicio=strpos($XML_string, "<$Pai>");

				$fim=strpos($XML_string, "</$Pai>");


				#$inicio+=$pai_l+2;

				$texto_validacao=substr($XML_string, $inicio, $fim);


				$validacao=strpos($texto_validacao, "<$name>");

				
				$validar_pai=strpos($texto_validacao, "<$Pai>");


				///////////

				$inicio=strpos($texto_validacao, "<$Pai>");

				$fim=strpos($texto_validacao, "</$Pai>");


				#$inicio+=$pai_l+2;

				$texto_validacao=substr($texto_validacao, $inicio, $fim);


				$validacao=strpos($texto_validacao, "<$name>");

				
				$validar_pai=strpos($texto_validacao, "<$Pai>");


				if($validar_pai===false)
				{
					echo "<br>Elemento Pai não existe<br>";

					return null;

				} /// fim else if($validar_pai===false)

				if($validacao===false)
				{
					$XML_string=str_replace("<$Pai>", "<$Pai> \n\t<$name></$name>", $XML_string);

					$XML_string=str_replace("><", "> <", $XML_string);

					

					$XML_string=str_replace("$name> </$name", "$name> </$name", $XML_string);

					$XML_string=str_replace("></$Pai", "> </$Pai", $XML_string);
			
					$arquivo=fopen("../XMLs/arquivo.xml", "wb");

					fwrite($arquivo, $XML_string);


					$this->carregar_XML_file();
						

					$this->XML->saveXML();
				}else /// fim if($validação===false)
				{
					echo "<br>Elemento já existe";

					return null;
				}


			} /// fim public function adicionar_elemento($name, $pai)

			


			public function adicionar_texto($name, $texto)
			{

				$XML_string=file_get_contents("../XMLs/arquivo.xml");

				$arquivo=fopen("../XMLs/arquivo.xml", "wb");


				$XML_string=str_replace("<$name>", "<$name> $texto. \t", $XML_string);

				fwrite($arquivo, $XML_string);

				$this->carregar_XML_file();

			}/// fim public function adicionar_texto()


			public function adicionar_atributo($name, $node, $valor)
			{

				$this->XML->save("../XMLs/arquivo.xml");

				$XML_string=file_get_contents("../XMLs/arquivo.xml");

				$arquivo=fopen("../XMLs/arquivo.xml", "wb");


				$XML_string=str_replace("<$node", "<$node $name='$valor'", $XML_string);

				fwrite($arquivo, $XML_string);

				$this->carregar_XML_file();

			} /// fim public function adicionar_atributo($name, $node, $valor)




		//=============================
		//=============================

		



		



		

	//===========================================
	//===========================================
	//===========================================




	//===========================================
	//==================VALORES==================
	//===========================================





		public function alterar_texto($name, $texto)
		{

		}/// fim public function altetar_texto($name, $texto)



		public function alterar_atributo($name, $node, $valor)
		{

		}


	//===========================================
	//===========================================
	//===========================================






	private function formatar_DOM()
	{
		$this->XML->preserveWhiteSpace=false;

		$this->XML->formatOutput=true;

	}/// fim function formatar()



	private function formatar_bli()
	{

	} /// fim function formatar()



	#$domtree = new DOMDocument('1.0', 'UTF-8');


	
	


	public function delete_XML()
	{
		unset($this->XML);
	}

	public function return_XML()
	{
		return $this->XML->saveXML();
		
	}

}/// fim class XML


?>