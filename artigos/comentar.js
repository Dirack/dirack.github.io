/*
	 blogAjax.js (JavaScript)
	 
	 Objetivo: Adicionar comentário novo na página do blog (artigos.html)
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

	$("#form").bind("submit", function(e){

		e.preventDefault();

		/* Obter a página xml (xmlpage) da URL */ 
		res=location.search.split("=");
		var txt = "var="+res[1]+"&"+$(this).serialize();

		//alert(txt);

		$.ajax({
			type:'POST',
			url:'https://existentialist-addi.000webhostapp.com/artigos/comentar.php',
			data:txt,
			success:function(resultado){
				$('#comentariosAnteriores').prepend(resultado);
			},

			error:function(){
				alert("erro na solicitação AJAX em comentar.js");
			}

		});

	});


});

