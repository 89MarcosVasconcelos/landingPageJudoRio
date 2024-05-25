<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//echo "to aqui";
	//1 – Definimos Para quem vai ser enviado o email
/*$para = "drraphaelrocha@gmail.com";
//$para = "drraphaelrocha@gmail.com";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['nome'];
$email = $_POST['email'];
$contagem = $_POST['contagem'];
$local = $_POST['local'];
// 3 - resgatar o assunto digitado no formulário e  grava na variavel 
//$assunto
$telefone = $_POST['telefone'];
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail

$mensagem = $_POST['mensagem'];
*/



$nome = "Marcos";
$email = "marcos.vasconcelos@mable.com.br";
$telefone = "21999999";
$mensagem = "teste de ééééé envio";
$local = "Barra";
$contagem = 0;


if($contagem == 0){
	include "email_teste.php";
$corpoMensagem = '
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8"/>
<table style="width:600px; border: 0.5px solid black;  padding: 5px; border-collapse: collapse;
  text-align: left;  ">
  <tr>
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">Nome</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$nome.'</td>
  </tr>
  <tr>
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">E-mail</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$email.'</td>    
  </tr>  
  <tr>
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">Telefone</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$telefone.'</td>    
  </tr>
  <tr>
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">Local</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$local.'</td>    
  </tr>
  <tr>
    <th colspan="2" style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;"><center>Mensagem</center></th>
       </tr>
       <tr>
       <td colspan="2" style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$mensagem.'</td>   
       </tr>
</table>
 ';

 $i = 0;
 
try {
	ini_set('default_charset', 'UTF-8');
	/*
	$pdo = new PDO(   'mysql:host=172.27.2.10; dbname=drraphael' ,'drraphaeluser', '1Oyeyo8ukOCE', 
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
        );
  //$pdo = new PDO('mysql:host=172.27.21.3;dbname=drraphael','drraphaeluser', '1Oyeyo8ukOCE');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT NOW() as dtNow, dt_insert FROM contact_cli WHERE email = :email ORDER BY id DESC LIMIT 1;');
	$query->execute(array(    
		':email' => $email,
	));
  
	while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
		$dt = $linha['dt_insert'];
		$dtNow = $linha['dtNow'];
	}
	//$dateDifference = abs(strtotime($dtNow) - strtotime($dt));

	//if($dateDifference >= 41 || $dt == ''){
	$stmt = $pdo->prepare('INSERT INTO contact_cli (name, phone, email, message, locale) VALUES(:nome,:telefone, :email, :mensagem, :local)');
	$stmt->execute(array(
		':nome' => $nome,
		':telefone' => $telefone,
		':email' => $email,
		':mensagem' => $mensagem,
		':local' => $local
	));*/
	
	//smtpmailer('marcos.vasconcelos@mable.com.br' , 'informativo@insetisan.com.br', $nome, "Contato cliente", $corpoMensagem);
	smtpmailer('marcos.vasconcelos@mable.com.br' , 'noreplay@drraphaelrocha.com.br', $nome, "Contato cliente", $corpoMensagem);
	//smtpmailer($para  , 'marcos.vasconcelos@mable.com.br', $nome, "Contato cliente", $corpoMensagem);

  //echo $stmt->rowCount();
	//}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
}

?>