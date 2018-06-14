<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Disparar Email</title>
</head>

<body>
<h1>Escreva o destinário</h1>
<form action="email.php" method="post">
Email:<br />
<input type="text" name="email" />
<br />
Nome:
<br />
<input type="text" name="nome" />
<br />
<br />
<select name='modelo' id='modelo'>
	<option value='1'>Instalação do vTigerCRM</option>
	<option value='2'>Dia 10: Lembrete: Fatura Pronta</option>
</select>
<br />
<input type="submit" value="enviar" />
</form>
<?php
if($_POST['modelo']==1) {
	$mensagem = utf8_decode(file_get_contents("resposta-vtiger.html"));

	$titulo = 'Instalacao do vTigerCRM | Francisco Matelli';
} elseif($_POST['modelo']==2) {
	$mensagem = utf8_decode(file_get_contents("fatura-pronta-aviso-1.htm"));

	$titulo = 'Fatura Dynamo | Francisco Matelli';
}


$cabecalho = "From:Francisco Matelli <contato@franciscomatelli.com>\r\n";
$cabecalho.= "Content-Type: text/html;\r\n charset=\"iso-8859-1\"\r\n";
		
if(mail($_POST['email'], $titulo, $mensagem, $cabecalho))
echo "<script>alert(\"Sucesso ao enviar ".$_POST['email']."\")</script>";
else
echo "<script>alert(\"Falha ao enviar\")</script>";

?>
</body>
</html>
