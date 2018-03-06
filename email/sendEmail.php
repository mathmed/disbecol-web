

<?php 

require '../assets/PHPMailer/PHPMailerAutoload.php';

$email = $_POST['email'];
$nome = $_POST['nome'];
$msg = $_POST['msg'];



$mail = new PHPMailer; //faz a instância do objeto PHPMailer
//$mail->SMTPDebug = true; //habilita o debug se parâmetro for true
$mail->isSMTP(); //seta o tipo de protocolo
$mail->Host = 'smtp.gmail.com'; //define o servidor smtp
$mail->SMTPAuth = true; //habilita a autenticação via smtp
$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
$mail->SMTPSecure = 'tls'; //tipo de segurança
$mail->Port = 587; //porta de conexão
$mail->CharSet = 'UTF-8';
$mail->FromName = $nome;
//dados de autenticação no servidor smtp
$mail->Username = 'mateus@disbecol.com.br'; //usuário do smtp (email cadastrado no servidor)
$mail->Password = 'Medeiros1998'; //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****

$mail->AddCC("contatos@disbecol.com.br");
//configuração da mensagem
$mail->isHTML(true); //formato da mensagem de e-mail
$mail->Subject = "Uma nova mensagem foi enviada a partir do site."; //assunto
$mail->Body    = "<b>Nome do contato:</b> ".$nome."<br/><b>E-mail do contato:</b> ".$email."<br/><b>Mensagem:</b> ".$msg;

if(!$mail->send()) { //Neste momento duas ações são feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (não enviado) juntamente com o operador de negação "!" entra no bloco if.
	header("Location: ../index.html?eae=1");
} else {
	header("Location: ../index.html?eae=2");

}


?>