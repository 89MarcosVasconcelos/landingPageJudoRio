<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//echo "to aqui";
	//1 – Definimos Para quem vai ser enviado o email
$para = "marcos.vasconcelos@mable.com.br";
//$para = "drraphaelrocha@gmail.com";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['nome'];
$email = $_POST['email'];
$contagem = $_POST['contagem'];
// 3 - resgatar o assunto digitado no formulário e  grava na variavel 
//$assunto
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail

$mensagem = $_POST['mensagem'];


if($contagem == 0){
	include "email.php";
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
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">Cidade</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$cidade.'</td>    
  </tr>
  <tr>
    <th style="width:150px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">Bairro</th>
    <td style="width:450px; padding: 5px; border: 0.5px solid black;  border-collapse: collapse;">'.$bairro.'</td>    
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
	
	/*$pdo = new PDO(   'mysql:host=localhost; dbname=fjerj_bd' ,'root', '1378457514d6f321139ecf623ea722c06c7b206fdafad15e', 
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
        );
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT NOW() as dtNow, dt_insert FROM contacts WHERE email = :email ORDER BY id DESC LIMIT 1;');
	$query->execute(array(    
		':email' => $email,
	));
  
	while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
		$dt = $linha['dt_insert'];
		$dtNow = $linha['dtNow'];
	}


	$stmt = $pdo->prepare('INSERT INTO contacts (name, city, neighborhood,  phone, email, message) VALUES(:nome, :cidade , :bairro , :telefone, :email, :mensagem)');
	$stmt->execute(array(
		':nome' => $nome,
		':telefone' => $telefone,
		':cidade' => $cidade,
		':bairro' => $bairro,
		':email' => $email,
		':mensagem' => $mensagem
		
	));*/
	
	smtpmailer('pablo.rodrigues@gmail.com' , 'autorizacao@nemtodofaixapretaefaixapreta.com', $nome, "Judô Rio", $corpoMensagem);
	smtpmailer('marcos.vasconcelos89@gmail.com' , 'autorizacao@nemtodofaixapretaefaixapreta.com', $nome, "Judô Rio", $corpoMensagem);
	smtpmailer('autorizacao@nemtodofaixapretaefaixapreta.com' , 'autorizacao@nemtodofaixapretaefaixapreta.com', $nome, "Judô Rio", $corpoMensagem);
	//smtpmailer($para  , 'marcos.vasconcelos@mable.com.br', $nome, "Contato cliente", $corpoMensagem);

  //echo $stmt->rowCount();
	//}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
}

?>