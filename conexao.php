<?php
	$conexao=@mysql_connect("localhost","root","") or die ("Falha de conexao".mysql_error());
	mysql_select_db("ope1", $conexao) or die ("erro no banco ou inexistente".mysql_error());
?>	