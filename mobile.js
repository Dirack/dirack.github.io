/*
	 mobile.js (JavaScript)
	 
	 Objetivo: Menu Responsivo do site Dirack's Lounge.
	 
	 Versão 1.0
	 
	 Site: http://www.dirackslounge.online
	 
	 Programador: Rodolfo A. C. Neves (Dirack) 28/03/2019
	 
	 Email: rodolfo_profissional@hotmail.com
	 
	 Licença: Software de uso livre e código aberto.
*/

$(document).ready(function(){

	$('#menuMobileImg').bind('click', function(){

		if($('#menuMobile nav').css('display')=='none'){
			$('#menuMobile nav').fadeIn();
		}else{
			$('#menuMobile nav').fadeOut();
		}

	});


});
