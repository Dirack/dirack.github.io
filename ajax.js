/*
	ajax.js (JavaScript)
	
	Objetivo: Exibir os posts recentes na página index.html
	a partir dos dados na página posts.xml feito por solicitação AJAX. 
	Adaptado do estudo sobre solicitação Ajax em JavaScript.
	
	Email: rodolfo_profissional@hotmail.com

	Original: Rodolfo A. C. Neves 16/01/2019

	Programador: Rodolfo A. C. Neves 20/01/2019
*/



function ajax(){

	/*
		XMLHttpRequest() é um objeto que permite fazer a comunicação com o
		servidor de forma dinâmica.
	*/
	var xmlHttp = new XMLHttpRequest();

	/* 
		onreadystatechange significa que a função abaixo será chamada toda
		vez que a propriedade readystate for alterada. readyState detém o
		status da XMLHttpRequest. Pode assumir os seguintes valores:
			0: requisição não inicializada
			1: Conexão com o servidor estabelecida
			2: requisição recebida
			3: processando requisição
			4: requisição terminada e a resposta está pronta 
		A propriedade status retorna o status-number de uma requisição:
			200: "OK"
			403: "Forbidden"
			404: "Not Found"
		Ou seja, o if na função abaixo permite que a resposta seja retornada se
		a requisição está terminada e pronta (readyState=4) e tudo ocorreu bem
		com a requisição (status=200).
		A propriedade responseText o servidor responde com texto.
		Se utilizar responseXML o servidor responde com um arquivo XML.
	*/

	
	/* 
		A saída foi adaptada para o formato exigido pela págiga index.html.
		A função abaixo pode ser readaptada para exibir qualquer formato
		html exigido pela página.

	*/
	xmlHttp.onreadystatechange = function(){	
		if(xmlHttp.readyState===4&&xmlHttp.status===200){
		
			xmlDoc = xmlHttp.responseXML;
			txt = "";
			
			autor = xmlDoc.getElementsByTagName("autor");
			data = xmlDoc.getElementsByTagName("data");
			fonte = xmlDoc.getElementsByTagName("fonte");
			thumb = xmlDoc.getElementsByTagName("thumb");
			titulo = xmlDoc.getElementsByTagName("titulo");
			resumo = xmlDoc.getElementsByTagName("resumo");


			for(i=0; i<autor.length; i++){
			    			
			    // Formatar data de AAAA-MM-DD para DD/MM/AAAA
			    dataform = data[i].childNodes[0].nodeValue.split('-');
			
				//txt += '<a href='+fonte[i].childNodes[0].nodeValue+' title="Ler artigo completo?">';
				txt += '<a href="manutencao.html" title="Ler artigo completo?">';
				txt += '<img class="thumb" align="left" src="'+thumb[i].childNodes[0].nodeValue;
				txt += '" alt="Linux user" border=0></a>';
				//txt += '<h3><a href='+fonte[i].childNodes[0].nodeValue+' title="Ler artigo completo?">';
				txt += '<h3><a href="manutencao.html" title="Ler artigo completo?">';
				txt += titulo[i].childNodes[0].nodeValue+'</a></h3>';
				txt += "<p><small>Por <em>"+autor[i].childNodes[0].nodeValue + "</em> em ";
				
				// Data formatada para DD/MM/AAAA
				txt +=  +dataform[2]+"/"+dataform[1]+"/"+dataform[0]+ "</small></p>";
				
				txt += '<p id="descricao">'+resumo[i].childNodes[0].nodeValue + "</p><br>";
			}
			

			document.getElementById("postagens").innerHTML = txt;
		}
	};

	/* Abre o arquivo ajax.txt com o método GET*/
	xmlHttp.open("GET","posts.xml",true);

	/* Envia para a página */
	xmlHttp.send(null);

	
}
