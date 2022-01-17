
<h1>Bem vindo a XMLPHP</h1>

<p>XMLPHP é uma bliblioteca brasileira criada pelo Analista Fillipe Augusto para facilitar o Desenvolvimento com arquivos XML</p>



<p>A bilbioteca está na versão ALPHA, por tanto pode possuir bugs.<br>
outras funcionalidades podem surigr no futuro.</p>




<h2>Tutorial</h2>


<ol>
	
<a name="ancora"></a>
- [Criar XML](#I_criar_XML)

- [Adicionar Elemento](#I_adicionar_elemento)

- [Apagar Elemento](#I_apagar_elemento)

- [Adicionar Atributo](#I_adicionar_atributo)

</ol>




<h3 id="I_criar_XML">Criar XML</h3>
	
		
	create_XML(XML);

	XML -> obrigatório


	"XML" será o nome do XML.

	




<h3 id="I_adicionar_elemento">Adicionar Elemento</h3>
	

		adicionar_elemento(name, Pai);

		name -> obrigatório

		Pai -> obrigatório


		'name' é o elemento a ser criado.

		'Pai' é o nó ao qual vai pertencer o elemento
		(caso seja um elemento principal, 'Pai' deve ter o nome do XML)


		Exemplo:
		

		<?xml version="1.0" encoding="UTF-8"?>
			<Venda Venda_Total="16.23">


			</Venda>
		


		O nome do XML é Venda, logo se usarmos a função desta maneira:
		adicionar_elemento("Produto", "Venda")
		vamos obter o seguinte resultado;


		

		<?xml version="1.0" encoding="UTF-8"?>
			<Venda Venda_Total="16.23">
				
				<Produto>

				</Produto>
			
			</Venda>
		

		Caso seja necessário adicionar um elemento dentro de "Produto", basta utlizar com "Produto" no campo "Pai".

		adicionar_elemento("Caderno", "Produto")

		O resultado será

		

		<?xml version="1.0" encoding="UTF-8"?>
			<Venda Venda_Total="16.23">
				
				<Produto>
					<Caderno>

					</Caderno>

				</Produto>
			
			</Venda>
		
	




<h3 id="I_Apagar_elemento">Apagar Elemento</h3>
	

		apagar_elemento(name, Pai);

		name -> obrigatório

		Pai -> obrigatório

		"name" é o elemento que será apagado.

		"Pai" é ao qual nó ele pertence.

		Exemplo:

		<?xml version="1.0" encoding="UTF-8"?>
			<Venda>
				<Produto>
					<Fubá>
						<Valor>12.78</Valor>
					</Fubá>

					<Maçã>
							<Valor>3.45</Valor>
					</Maçã>
					<Laranja>
						<Valor>8.45</Valor>
					</Laranja>
				</Produto>


				<Servico>
					<Lavagem>45.82</Lavagem>
					<Conserto>89.72</Conserto>
					<Entrega>15.45</Entrega>
				</Servico>
			</Venda>


		Ao utilizar a função desta maneira =>

		apagar_elemento("Valor", "Laranja");

		Vamos obter o seguinte XML:


		<?xml version="1.0" encoding="UTF-8"?>
			<Venda>
				<Produto>
					<Fubá>
						<Valor>12.78</Valor>
					</Fubá>

					<Maçã>
						<Valor>3.45</Valor>
					</Maçã>
					<Laranja>
					</Laranja>
				</Produto>


				<Servico>
					<Lavagem>45.82</Lavagem>
					<Conserto>89.72</Conserto>
					<Entrega>15.45</Entrega>
				</Servico>
			</Venda>




		Ou podemos utilizar dessa forma =>

		apagar_elemento("Servico", "Venda");

		E obter:


		<?xml version="1.0" encoding="UTF-8"?>
			<Venda>
				<Produto>
					<Fubá>
						<Valor>12.78</Valor>
					</Fubá>

					<Maçã>
						<Valor>3.45</Valor>
					</Maçã>
					
					<Laranja>
					</Laranja>
				</Produto>
			</Venda>


<h3 id="I_adicionar_atributo">Adicionar Atributo</h3>
	
	adicionar_atributo(name, node, valor);

	name -> obrigatório

	node -> obrigatorio

	valor-> obrigatório


	"Name" é o nome do Atributo

	"Node" é a qual elemento pertence o atributo

	"valor" é o valor do Atributo


	Exemplo:


	<?xml version="1.0" encoding="UTF-8"?>
		<Venda>
			<Produto>
				<Fubá>
					<Valor>12.78</Valor>
				</Fubá>

				<Maçã>
					<Valor>3.45</Valor>
				</Maçã>

				<Laranja>
					<Valor>8.45</Valor>
				</Laranja>

			</Produto>
		</Venda>



	ao utulizarmos a função desta maneira=>

	adicionar_atributo("ValorTotal", "Produto", "16.23");

	vamos obter

	<?xml version="1.0" encoding="UTF-8"?>
		<Venda>
			<Produto ValorTotal="16.23">
				<Fubá>
					<Valor>12.78</Valor>
				</Fubá>

				<Maçã>
					<Valor>3.45</Valor>
				</Maçã>

				<Laranja>
					<Valor>8.45</Valor>
				</Laranja>
			</Produto>
		</Venda>
