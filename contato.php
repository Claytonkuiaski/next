<?php


//recebe as variáveis do formulário
$nome     = $_POST["nome"];
$email    = $_POST["email"];
$mensagem = $_POST["mensagem"];

// recebe a classe da pasta PHPmailer
require("PHPMailerAutoload.php");

//inicia a classe PHPMailer
$mail = new PHPMailer();

//Define os dados do servidor de e-mail
$mail->IsSMTP();
$mail->Host     = 'smtp-mail.outlook.com';           //Endereço do servidor SMTP
$mail->SMTPAuth = true;                         //Usa autenticação SMTP? (opcional) 
$mail->SMTPSecure = 'tls';
$mail->port     = 587;
$mail->Username = 'claytonkuiaski@hotmail.com'; //Usuário do Servidor SMTP
$mail->Password = '*******************';           //Senha do servidor SMTP

//define o remetente
$mail->Fron     = "claytonkuiaski@hotmail.com"; //seu e-mail
$mail->FronName = "Clayton";                    //Seu Nome

//Define o destinatátio(s)
$mail->AddAddress('claytonkuiaski@hotmail.com');
//$mail->AddCC(''); //Cópia
//$mail->AddBCC(''); //Cópia oculta


//Define os dados tecnicos da mensagem
$mail->IsHTML(true);  //Define que o e-mail vai ser em HTML

//Define a mensagem ( texto e assunto )
$mail->Subject = "Mensagem do site";
$mail->Body    = $mensagem;


//enviar o e-mail
$enviado = $mail->Send();

//Exibe uma mensagem de resultado
if ($enviado){
	echo "E-mail enviado com sucesso!";
}   else {
	echo "Não foi possivel enviar o e-mail!";
}




?>