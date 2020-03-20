<?php
/*
	naologado.php (PHP) - Página de logout.

	Objetivo: Informar ao usuário que a sessão foi encerrada.

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

session_start();

// Encerra a sessão
	session_unset();
	session_destroy();

echo "<p>Você não está logado!</p>";
echo "<a href='login.html'>Login</a>";


?>

