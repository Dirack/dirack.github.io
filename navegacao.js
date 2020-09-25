/*
	navegacao.js (JavaScript)

	Objetivo: Funções do menu de navegação do site Dirack's Lounge.
	Estas funções fazem o menu desaparecer e reaparecer quando o mouse
	está sobre a área de menu, ou quando a barra de rolagem se move para
	baixo.

	Email: rodolfo_profissional@hotmail.com

	Programador: Rodolfo A. C. Neves 20/01/2019
*/

// Menu aparece quando o usuário baixa a barra de rolagem 
/*window.addEventListener('scroll', function(event){ 
  if (window.scrollY > 200) {
     document.getElementById("menu").style.opacity = "1";
  }else {
     document.getElementById("menu").style.opacity = "0";
 }
});*/

// Quando o mouse está sobre a área de menu, a barra de menu aparece
// Quando o mouse é retirado da área de menu, a barra de menu some
/*function onMenu(){
	document.getElementById("menu").style.opacity = "1";
}
function offMenu(){
	document.getElementById("menu").style.opacity = "0";
}*/

// Na barra lateral à esquerda tem um ícone de mais. Quando clicado
// este exibe uma tela com as redes sociais extras da página. Estas
// funções fazem esta página oculta aparecer.
function onPlus(){

	element=document.getElementById("plus-on").style.display;

	if (element == 'none') {
		document.getElementById("plus-on").style.display= 'block';
	}else{
		document.getElementById("plus-on").style.display= 'none';
	}
}

// Quando o botão de mais é ativado e as redes sociais aparecem, os links
// desta página são ativados, quando a página some, os links são desativados
function goTo(link){
	if (document.getElementById("plus-on").style.display!='none') window.open(link);
}
