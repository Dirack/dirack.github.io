/*
	 blogAjax.js (JavaScript)
	 
	 Objetivo: Servir a página do blog (artigos.html) com os comentários 
	 através de solicitação AJAX.
	 
	 Versão 1.0
	 
	 Site: http://www.dirackslounge.online
	 
	 Programador: Rodolfo A. C. Neves (Dirack) 20/02/2019
	 
	 Email: rodolfo_profissional@hotmail.com
	 
	 Licença: Software de uso livre e código aberto.
*/

/* Carregar página com AJAX e JQuery */
// O método bind associa eventos a funções
$('document').ready(function(){

		/* Obter a página xml (xmlpage) da URL */
		res=location.search.split("=");
		var txt = "var="+res[1];

		$.ajax({
			type:'GET',
			url:'https://existentialist-addi.000webhostapp.com/artigos/artigos.php',
			data:txt,
			success:function(resultado){
				$('#comentariosAnteriores').html(resultado);
			},

			error:function(){
				alert("erro na solicitação AJAX");
			}

		});

});

