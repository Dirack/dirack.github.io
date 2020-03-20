<?php
/*
	editor.php (PHP) - Página de sessão (logado).

	Objetivo: Alimentar a página sessão.php através de AJAX JQuery.
	Responde aos botões no menu da página.

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

echo "<form id='form' action='postagem.php' method='GET' onsubmit='return checar();'>
	<div class='linha'>\n<p>Fonte: <input type='text' name='fonte' id='fonte'><br><br>
	thumbnail: <input type='text' name='thumb' id='thumb'><br><br>
				Título: <input type='text' name='title' id='title'><br><br>
				Autor: <input type='text' name='autor' id='autor'><br><br>
				Vídeo (opicional): <input type='text' name='video' id='video'><br><br>
			
			</p>
			</div>
			
			<!-- DATA -->
			<div class='linha'>
			<p>
				Data:
				<input type='date' name='data' id='data'>
				
			</p>
			</div>
			
			<!-- Primeiro parágrafo (resumo) da postagem --> 
			<div class='linha'>
			<p>
				Resumo:<br><br>
				<textarea name='resumo' id='resumo'></textarea>
			</p>
			</div>

			<!-- Demais parágrafos (subseções) da postagem -->
			<div class='linha'>
			<p>
			Edição de texto:
			<span><button id='insereSecao'>Seção</button></span>
			<span><button id='insereTexto'>Texto</button></span><br><br>
				<textarea name='texto' id='texto'></textarea>
			</p>
			</div>
			
			<!--Botão de envio -->
			<div class='linha' id='botao'>
			<p>
				<input type='submit' value='Enviar'/>
			</p>
			</div>
		
		
			</form>'";

?>
