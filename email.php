<?php

//recuperar dados do formulario
$GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);

//Variáveis locais
$Erro     = true;
$Nome     = $GetPost['nome'];
$Email    = $GetPost['email'];
$Mensagem = $GetPost['mensagem'];

//Incluir a classe PHPMailer
include_once 'PHPMailer/class.smtp.php';
include_once 'PHPMailer/class.phpmailer.php';

//Enviando o e-mail utilizando a classe PHPMailer
$Mailer = new PHPMailer;
$Mailer->CharSet = "utf8";
//$Mailer->SMTPDebug = 3;
$Mailer->IsSMTP();
$Mailer->Host = 'smtp.gmail.com';
$Mailer->SMTPAuth = true;
$Mailer->Username = "clayton.kuiaski@gmail.com";
$Mailer->Password = "mogui123";
$Mailer->SMTPSecure = "tls";
$Mailer->Port = 587;
$Mailer->FronName = "{$Nome}";
$Mailer->Fron = "claytonkuiaski@hotmail.com";
$Mailer->AddAddress("claytonkuiaski@hotmail.com");
$Mailer->IsHTML(true);
$Mailer->Subject = "Orçamento via Site - {$Nome}";
$Mailer->Body = "{$Mensagem},<br><br>E-mail do cliente: {$Email}";

//Verificação
$enviado = $Mailer->Send();

//Exibe uma mensagem de resultado
if ($enviado){
	echo "<strong>E-mail enviado com sucesso!</strong>";
}   else {
	echo "Não foi possivel enviar o e-mail!";
}













?>