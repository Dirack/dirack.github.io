/*
	ajax.js (JavaScript)
	
	Objetivo: Exibir artigo do blog listado na página index.html
	feito por solicitação AJAX. O endereço da página xml é passado pela
	URL e o texto é carregado na página modelo artigos.html
	Adaptado do estudo sobre solicitação Ajax em JavaScript.
	
	Email: rodolfo_profissional@hotmail.com

	Original: Rodolfo A. C. Neves 16/01/2019

	Programador: Rodolfo A. C. Neves 21/01/2019
*/

function ajax(){

	/* Obter a página xml (xmlpage) da URL */
	res=location.search.split("=");
	xmlpage=res[1]+".xml";

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
			
			/* Ler dados e formatar na variável 'txt' */
			titulo = xmlDoc.getElementsByTagName("titulo");
			autor = xmlDoc.getElementsByTagName("autor");
			data = xmlDoc.getElementsByTagName("data");

			txt += '<h2>'+titulo[0].childNodes[0].nodeValue+'</h2>';
			txt += "<p><small>Por <em>"+autor[0].childNodes[0].nodeValue + "</em> em ";
			
			//Converter a data do formato AAAA-MM-DD para DD/MM/AAAA
			dataform = data[0].childNodes[0].nodeValue.split('-'); 
			txt +=  +dataform[2]+"/"+dataform[1]+"/"+dataform[0]+ "</small></p>";

			// Tem vídeo?
			video = xmlDoc.getElementsByTagName("video");
			
			if (video[0].childNodes[0].nodeValue!="none") {
				txt += '<div id="video">';
				txt += '<iframe width="560" height="315" src="';
				txt += video[0].childNodes[0].nodeValue;
				txt += '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>"';
				txt += '</div>';
			}

			// Primeiro parágrafo
			p1 = xmlDoc.getElementsByTagName("p1");
			txt += '<p>'+p1[0].childNodes[0].nodeValue + "</p>";
			
			//data = xmlDoc.getElementsByTagName("data");
			//fonte = xmlDoc.getElementsByTagName("fonte");
			//thumb = xmlDoc.getElementsByTagName("thumb");
			//titulo = xmlDoc.getElementsByTagName("titulo");
			
			//Subseções e subtítulos, cada subseção tem um
			sub = xmlDoc.getElementsByTagName("sub");
			subtitulo = xmlDoc.getElementsByTagName("subtitulo");

			// Varre as seções
			for(i=0; i<sub.length; i++){
				txt += '<br><h3>'+subtitulo[i].childNodes[0].nodeValue+'</h3>';				
				p2 = sub[i].getElementsByTagName("p2");

				// Varre todos os parágrafos da seção
				for(j=0;j<p2.length;j++){

					p2p = p2[j].childNodes[0].nodeValue;

					/* Verificar se tem identação.
					   Esta é identificada pelo 
					   caractere especial '§' */
					if (p2p.indexOf("§")!=-1) {
						txt += '<p>'+p2p.replace(/§/g, "&emsp;&emsp;")+'</p>'; 

					} else {
						txt += '<p>'+p2p+'</p>';
					}
				}
			}

			document.getElementById("texto").innerHTML = txt;
		}
	};

	/* Abre o arquivo ajax.txt com o método GET*/
	xmlHttp.open("GET",xmlpage,true);

	/* Envia para a página */
	xmlHttp.send(null);

	
}
