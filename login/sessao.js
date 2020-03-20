/*
	sessao.js (JavaScript)	

	Objetivo: Validar os dados do formulaŕio na página sessao.php para que possam ser
	registrados pelo script em PHP postagem.php como nova postagem do site.

	Email: rodolfo_profissional@hotmail.com
	
	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

// Função para formatar texto e caractes especiais na textarea da página
function Conversor(){

	// Variável txt recebe todo o texto digitado
	txt = "";
	txt += document.getElementById("texto").value;

	txt = txt.replace(/§ss/g, "<sub>\n<subtitulo>");
	txt = txt.replace(/§se/g, "</subtitulo>");
	txt = txt.replace(/§ps/g, "<p2>");
	txt = txt.replace(/§pe/g, "</p2>");
	txt = txt.replace(/§e/g, "</sub>");

	document.getElementById("texto").value = txt;

	review = "";

	review += '<entrada>\n<fonte>'+document.getElementById("fonte").value+'</fonte>';
	review += 'thumb>'+document.getElementById("thumb").value+'</thumb>';
	review += '<titulo>'+document.getElementById("titulo").value+'</titulo>';
	review += '<autor>'+document.getElementById("autor").value+'</autor>';
	review += '<data>'+document.getElementById("data").value+'</data>';
	review += '<resumo>'+document.getElementById("resumo").value+'</resumo>';
	review += txt;

	return confirm(review);

}

// Função para visualizar o texto xml que será formatado
function ver(){

	// Variável txt recebe todo o texto digitado
	txt = "";
	txt += document.getElementById("texto").value;

	txt = txt.replace(/§ss/g, "<sub>§b<subtitulo>");
	txt = txt.replace(/§se/g, "</subtitulo>§b");
	txt = txt.replace(/§ps/g, "<p2>§b");
	txt = txt.replace(/§pe/g, "</p2>§b");
	txt = txt.replace(/§e/g, "</sub>§b");

	review = "<?xml version='1.0' encoding='UTF-8'?>§b<entradas>§b";

	review += "<entrada>§b<fonte>"+document.getElementById("fonte").value+'</fonte>§b';
	review += '<thumb>'+document.getElementById("thumb").value+'</thumb>§b';
	review += '<titulo>'+document.getElementById("title").value+'</titulo>§b';
	review += '<autor>'+document.getElementById("autor").value+'</autor>';
	review += '<data>'+document.getElementById("data").value+'</data>§b';
	review += '<resumo>'+document.getElementById("resumo").value+'§b</resumo>§b';
	review += txt+'</entrada>§b</entradas>';

	review = review.replace(/</g,"&lt;");
	review = review.replace(/>/g,"&gt;");
	review = review.replace(/§b/g,"<br>");

	win = window.open(" ","_blank",'height=700,width=700');

	win.document.write("<!doctype html>\n<head>\n<title>Esboço XML</title>\n</head>\n<body>\n<p>\n");

	win.document.write(review);

	win.document.write("\n</p>\n</body>\n</html>");

}

// Função para visualizar o texto xml que será formatado
function print(){

		// Variável txt recebe todo o texto digitado
	txt = "";
	txt += document.getElementById("texto").value;

	txt = txt.replace(/§ss/g, "<sub>§b<subtitulo>");
	txt = txt.replace(/§se/g, "</subtitulo>§b");
	txt = txt.replace(/§ps/g, "<p2>§b");
	txt = txt.replace(/§pe/g, "</p2>§b");
	txt = txt.replace(/§e/g, "</sub>§b");

	review = "<?xml version='1.0' encoding='UTF-8'?>§b<entradas>§b";

	review += "<entrada>§b<fonte>"+document.getElementById("fonte").value+'</fonte>§b';
	review += '<thumb>'+document.getElementById("thumb").value+'</thumb>§b';
	review += '<titulo>'+document.getElementById("title").value+'</titulo>§b';
	review += '<autor>'+document.getElementById("autor").value+'</autor>';
	review += '<data>'+document.getElementById("data").value+'</data>§b';
	review += '<resumo>'+document.getElementById("resumo").value+'§b</resumo>§b';
	review += txt+'</entrada>§b</entradas>';

	review = review.replace(/</g,"&lt;");
	review = review.replace(/>/g,"&gt;");
	review = review.replace(/§b/g,"<br>");

	win = window.open(" ","_blank",'height=700,width=700');

	win.document.write("<!doctype html>\n<head>\n<title>Esboço XML</title>\n</head>\n<body>\n<p>\n");

	win.document.write(review);

	win.document.write("\n</p>\n</body>\n</html>");
	//win.document.write(review);

	win.document.close();

	win.print();

	//alert(review);

}

// Checar se o usuário forneceu todos os dados
function checar(){
	
	// O usuário forneceu o nome para o arquivo de texto xml?	
	if (document.getElementById("fonte").value==""){
		alert("Forneça o nome do arquivo xml onde ficará armazenado seu texto!");
		return false;
	}
	
	// forneceu o nome do arquivo de imagem thumbnail?
	else if (document.getElementById("thumb").value==""){
		alert("Forneça o nome do arquivo de imagem que aparecerá como thumbnail da sua postagem!");
		return false;
	}

	// forneceu um título?
	else if (document.getElementById("title").value==""){
		alert("Forneça um título para o seu post!");
		return false;
	}

	// forneceu o seu nome?
	else if (document.getElementById("autor").value==""){
		alert("Forneça o seu nome!");
		return false;
	}

	// forneceu uma data para sua postagem?
	else if (document.getElementById("data").value==""){
		alert("Forneça a data!");
		return false;
	}

	// forneceu um resumo (primeiro parágrafo da postagem)?
	else if (document.getElementById("autor").value==""){
		alert("Forneça um resumo (primeiro parágrafo da postagem)!");
		return false;
	}
 
	else{

		// Coverter o texto para o formato XML padrão
		return Conversor();

	}
}

function salvar(){

	txt = document.getElementById("texto").value;

	sessionStorage.setItem("texto",txt);

	alert(txt);

}

function load(){

	document.getElementById("texto").value = sessionStorage.getItem("texto");

}
