/*
	 blogAjax.js (JavaScript)
	 
	 Objetivo: Servir a página do blog (query.php) com os resultados das pesquisas
	 por artigos através de solicitação AJAX. Ao clicar em um botão os artigos 
	 relacionados a página aparecem.
	 
	 Versão 1.0
	 
	 Site: http://www.dirackslounge.online
	 
	 Programador: Rodolfo A. C. Neves (Dirack) 20/02/2019
	 
	 Email: rodolfo_profissional@hotmail.com
	 
	 Licença: Software de uso livre e código aberto.
*/

/* Carregar página com AJAX e JQuery */
// O método bind associa eventos a funções
$(document).ready(function(){

	/* 
		Ao clicar no botão, uma solicitação AJAX é enviada para
		query.php que se comunica com o banco de dados e retorna
		a resposta se há algum artigo cadastrado. O botão solicita
		a pesquisa passando o atributo 'value' que é a chave da pesquisa.
		Exemplo 'value=fortran' para procurar artigos sobre fortran.
	*/
	$("button").bind("click", function(e){

		var txt = "botao="+$(this).attr('value');

		$.ajax({
			type:'POST',
			url:'query.php',
			data:txt,
			success:function(resultado){
				$('#postagens').html(resultado);
			},

			error:function(){
				alert("erro na solicitação AJAX");
			}

		});

	});


});

