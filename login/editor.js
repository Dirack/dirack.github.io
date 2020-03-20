/*
	 editor.js (JavaScript)
	 
	 Objetivo: Scripts da página de edição de texto do site (sessao.php).
	 Carregada após o login, realizado em login.html. É responsável por
	 carregar dados na página e pelas funcionalidades dos botões.
	 
	 Versão 1.0
	 
	 Site: http://www.dirackslounge.online
	 
	 Programador: Rodolfo A. C. Neves (Dirack) 20/02/2019
	 
	 Email: rodolfo_profissional@hotmail.com
	 
	 Licença: Software de uso livre e código aberto.
*/

/* Carregar funções JQuery */
$(document).ready(function(){

	txt ="";

		/* Solicitação AJAX ao script 'salvos.php' para carregar todos
		os textos salvos no banco de dados à barra lateral à direita e
		possibilitar o carregamento destes textos na página*/
		$.ajax({
			type:'GET',
			url:'salvos.php',
			data:txt,
			success:function(resultado){
	
				/* Título da barra lateral textos salvos */
				$('#barraLateral h3').after(resultado);

				/* Ao clicar em um texto salvo na lista de textos salvos 
			   	na barra lateral à direita, o texto é carregado na página
				com esta solicitação AJAX ao script carregar.php */
				$('.textoSalvo').bind("click", function(b){

					/* Cada texto do banco de dados é identificado pelo título */
					txt ="titulo="+$(this).text();

					$.ajax({
						type:'GET',
						url:'carregar.php',
						data:txt,
						success:function(resultado){

							/* O resultado da solicitação é uma string
							com os dados separados pelo caractere especial '§*'
							*/
							resultado=resultado.split('§*');
							$('#fonte').val(resultado[0]);
							$('#thumb').val(resultado[1]);
							$('#title').val(resultado[2]);
							$('#autor').val(resultado[3]);
							$('#video').val(resultado[4]);
							$('#data').val(resultado[5]);
							$('#resumo').val(resultado[6]);
							$('#texto').val(resultado[7]);

						},

						error:function(){
							alert("erro na solicitação AJAX ao script 'carregar.php'");
						}

					});

				});

			},

			error:function(){
				alert("erro na solicitação AJAX ao script 'salvos.php'");
			}

		});

	/* Botão de logout da página no topo à direita seta branca do lado da foto de perfil */
	/* Ao clicar na seta o menu de logout aparece e ao clicar de novo desaparece */
	$("#logout").bind("click",function(){


		if ($('#menuLogout').css('display') == 'none'){
			
			$('#menuLogout').fadeIn();
			
		}else{

			$('#menuLogout').fadeOut();
	
		}

	});

	/* Botão para inserir um novo texto 
	A solicitação AJAX é feita ao script editor.php que
	carrega a página de formulário na página*/
	$("#botaoNovoTexto").bind("click", function(){

		txt ="";

		$.ajax({
			type:'POST',
			url:'editor.php',
			data:txt,
			success:function(resultado){

				/* Carregar formulário na página */
				$('#caixa_interna').html(resultado);

				/* Carregar as funções de inserção de texto */
				$('#caixa_interna').ready(function(){

					/* Inserir uma subseção na textarea */
					$('#insereSecao').bind("click",function(e){

						/* Não permitir que o formulário seja enviado */
						e.preventDefault();

						txt = "";
						txt += document.getElementById("texto").value;
						txt +="§ss\n\n";
						txt +="§se\n";
						txt +="§ps\n\n";
						txt +="§pe\n";
						txt +="§e";

						document.getElementById("texto").value = txt;
					});

					/* Inserir parágrafo na textarea */
					$('#insereTexto').bind("click",function(e){
						
						/* Não permitir que o formulário seja enviado */
						e.preventDefault();

						txt = "";
						txt += document.getElementById("texto").value;
						txt = txt.replace(/§e/g, "§ps\n\n§pe\n§e");

						document.getElementById("texto").value = txt;
					});

				});
			},

			error:function(){
				alert("erro na solicitação AJAX ao script 'editor.php'");
			}

		});

	});

	/* 
	   Botão para salvar o texto digitado no formulário no banco de dados 
	   de textos salvos.
	*/
	$("#botaoSalvarTexto").bind("click", function(){

		/* Recolha as informações digitadas no formulário */
		txt ="fonte="+$('#fonte').val();
		txt +="&thumb="+$('#thumb').val();
		txt +="&titulo="+$('#title').val();
		txt +="&autor="+$('#autor').val();
		txt +="&video="+$('#video').val();
		txt +="&data="+$('#data').val();
		
		/* Substitua caractes especiais de ' e " inseridos pelo usuário */
		txt +="&resumo="+$('#resumo').val().replace(/\'/g,"\\\'").replace(/\"/g,"\\\"");
		txt +="&texto="+$('#texto').val().replace(/\'/g,"\\\'").replace(/\"/g,"\\\"");

		/* Solicitação AJAX para armazenar as informações no banco de dados 
			As informações são salvas no banco identificadas pelo título
			se for solicitado salvar um texto com um título que já existe
			o script 'salvar.php' sobreescreve.
		*/
		$.ajax({
			type:'POST',
			url:'salvar.php',
			data:txt,
			success:function(resultado){
				$('#caixa_interna').html(resultado);
			},

			error:function(){
				alert("erro na solicitação AJAX ao script 'salvar.php'");
			}

		});

	});

	


});
