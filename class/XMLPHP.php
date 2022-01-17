<?php


class XML 
{

	private $node_principal=null;

	private $nome_xml;

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

		$this->preserveWhiteSpace =false;

		$this->XML->formatOutput = true;
				
		$this->XML->saveXML();

	}/// fim carregar_XML_file()


	


	//===========================================
	//==================ESTRUTURA================
	//===========================================



		//=============================
		// VALIDAR

			private function validacao_filho(&$XML_string,  &$Pai, &$name,
				&$validacao=null, &$validar_pai=null)
			{

				$inicio=strrpos($XML_string, "<$Pai");

				$fim=strrpos($XML_string, "</$Pai>");

				$filho_l=strlen($name);

				$pai_l=strlen($Pai);

				$fim-=$inicio;

				$fim+=$pai_l+3;



				#$inicio+=1;

				$texto_validacao=substr($XML_string, $inicio, $fim);


				$validacao=strpos($texto_validacao, "<$name");

						
				$validar_pai=strpos($texto_validacao, "<$Pai");

				return $texto_validacao;

			} /// fim private function validacao_filho(&$XML_string,  &$Pai, &$name, &$validacao, &$validar_pai)



			private function validacao_elemento(&$XML_string, &$name)
			{


				$inicio=strrpos($XML_string, "<$name");

				$fim=strrpos($XML_string, "</$name>");

				$elemento_l=strlen($name);


				#$fim-=($elemento_l*2);

				$fim-=$inicio;


				$fim+=$elemento_l+3;

				$texto_validacao=substr($XML_string, $inicio, $fim);

				return $texto_validacao;

			}////

		//=============================
		//=============================



		//=============================
		// CRIAR

			public function create_XML($name)
			{


				$this->nome_xml=$name;

				if($this->node_principal!=null)
				{

					$this->node_principal=$this->XML->createElement($name, " ");

					$this->XML->appendChild($this->node_principal);


					$this->XML->save("../XMLs/arquivo.xml");


					$XML_string=file_get_contents("../XMLs/arquivo.xml");

					# $XML_string=str_replace("> <", ">\n<", $XML_string);

					$arquivo=fopen("../XMLs/arquivo.xml", "wb");

					fwrite($arquivo, $XML_string);


					$this->carregar_XML_file();
			
				}else /// if($this->node_principal!=null)
				{
					unset($this->XML);

					$this->XML =new DOMDocument('1.0', 'UTF-8');

					$this->node_principal=$this->XML->createElement($name, " ");

					$this->XML->appendChild($this->node_principal);

					$this->XML->save("../XMLs/arquivo.xml");


					$XML_string=file_get_contents("../XMLs/arquivo.xml");

					

					$arquivo=fopen("../XMLs/arquivo.xml", "wb");

					fwrite($arquivo, $XML_string);


					$this->carregar_XML_file();

				} /// fim else if($this->node_principal!=null)
				
			}/// fim public function create_XML($name)


			
			public function adicionar_elemento($name, $Pai, $Texto=" ")
			{

				$this->XML->save("../XMLs/arquivo.xml");


				$XML_string=file_get_contents("../XMLs/arquivo.xml");

				$validacao=null;

				$validar_pai=null;

				$texto_validacao=$this->validacao_filho($XML_string,  $Pai, $name, $validacao, $validar_pai);


				if($validar_pai===false)
				{
					echo "<br>Elemento Pai não existe<br>";

					return null;

				} /// fim else if($validar_pai===false)

				if($validacao===false)
				{

					$XML_string=str_replace("<$Pai>", "<$Pai>\n<$name>$Texto</$name>", $XML_string);

					$XML_string=str_replace("><", "> <", $XML_string);

					#$XML_string=str_replace("$name> </$name", "$name> </$name", $XML_string);

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


				$XML_string=str_replace("<$name></$name>", "<$name>$texto</$name>", $XML_string);

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



		//=============================
		// APAGAR


			public function apagar_elemento($name, $Pai)
			{

			
				$this->XML->save("../XMLs/arquivo.xml");


				$XML_string=file_get_contents("../XMLs/arquivo.xml");

				$pai_l=strlen($Pai);

				$texto_validacao=$this->validacao_filho($XML_string,  $Pai, $name);

				$inicio=strrpos($XML_string, "<$name");

				$fim=strrpos($XML_string, "</$name>");

				$elemento_l=strlen($name);

				$fim-=$inicio;

				$fim+=$elemento_l+3;

				$text_len=strlen($texto_validacao);

				$xml_att=substr_replace($XML_string, "", $inicio, $fim);


				$arquivo=fopen("../XMLs/arquivo.xml", "wb");


				#echo $xml_att;

				fwrite($arquivo, $xml_att);


				$this->carregar_XML_file();

				$this->XML->saveXML();
						
			}/// fim public function apagar_elemento($name, $pai)


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




	//===========================================
	//===============RETURN======================
	//===========================================



		public function return_XML()
		{
			$this->carregar_XML_file();

			return $this->XML->saveXML();
			
		}


		public function return_name()
		{
			return $this->nome_xml;
		}




	//===========================================
	//===========================================
	//===========================================


	public function formatar_DOM()
	{
		$this->XML->preserveWhiteSpace=false;

		$this->XML->formatOutput=true;

	}/// fim function formatar()


	public function delete_XML()
	{
		unset($this->XML);
	}

	

}/// fim class XML


?>