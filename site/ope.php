<?php
session_start();
$_login = $_POST['login']; 
$_senha = $_POST['senha'];
@mysql_connect("localhost", "root", "");
mysql_select_db("bdsite");

$_result = mysql_query("SELECT * FROM `usuarios` WHERE `loginUsuario` = '$_login' AND `senhaUsuario` = '$_senha'");
$_resultado = mysql_fetch_assoc($_result);

if(mysql_num_rows ($_result) > 0){
	$_SESSION['nome'] = $_resultado['nome'];
	$_SESSION['login'] = $_login;
	$_SESSION['senha'] = $_senha;
	header('location:index1.html');
}else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	//echo "Login:".$_login." Senha:".$_senha." Incorretos";
	header('location:index.html');
}

?>
