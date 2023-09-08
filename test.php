<?php
 
/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
 
if (isset($_POST['enviar'])){
 
 
/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
 
$enviaFormularioParaNome = 'Alexandre Cassiano';
$enviaFormularioParaEmail = 'alexandrecassiano@uol.com.br';
 
$caixaPostalServidorNome = 'Contato Power Voice';
$caixaPostalServidorEmail = 'alexandrecassiano@uol.com.br';
$caixaPostalServidorSenha = 'D20M1012';
 
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
 
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
 
$remetenteNome  = $_POST['nome'];
$remetenteEmail = $_POST['email'];
$telefone  = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
 
$mensagemConcatenada = 'Formulário gerado via website'.'<br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail .'<br/>'; 
$mensagemConcatenada .= 'telefone: '.$telefone.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
 
 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
require_once('PHPMailer-master/PHPMailerAutoload.php');


 
$mail = new PHPMailer();
 
$mail->SMTPSecure = 'tls';
$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode('Contato Power Voice');
$mail->Body  = utf8_decode($mensagemConcatenada);
 
 
$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
 
if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);

}else{
$mensagemRetorno = 'Formulário enviado com sucesso!';
header('Location: http://powervoiceproducoes.com.br/confirm.html');
} 
 
 
}
?>
