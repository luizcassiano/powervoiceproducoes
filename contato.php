
<?php

 
        //Variaveis de POST, Alterar somente se necessário 
        //====================================================
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];
		
		
		
        //====================================================
 
 
        //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
        //====================================================
        $email_remetente = "alexandre@powervoiceproducoes.com.br"; // deve ser um email do dominio
        //====================================================
 
 
        //Configurações do email, ajustar conforme necessidade
        //====================================================
        $email_destinatario = "alexandrecassiano@uol.com.br, luiz.cassiano.lima_neto@hotmail.com, alexandre@powervoiceproducoes.com.br"; // qualquer email pode receber os dados
        $email_reply = $email;
        $email_assunto = "Contato Power Voice";
        //====================================================
 
 
        //Monta o Corpo da Mensagem
        //====================================================
       
        $email_conteudo =  '<b>nome:</b> ' . $nome . '<br/>';
		$email_conteudo .=  '<b>email:</b> ' . $email . '<br/>';
		$email_conteudo .=  '<b>telefone:</b> ' . $telefone . '<br/>';
		$email_conteudo .=  '<b>mensagem:</b> ' . $mensagem . '<br/>';
        //====================================================
 
 
        //Seta os Headers (Alerar somente caso necessario)
        //====================================================
        $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
        //====================================================
		
		
 
        //Enviando o email
        //====================================================
        if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
             header('Location: http://powervoiceproducoes.com.br/confirma.html');
        }
        else{
               echo "</b>Falha no envio do E-Mail!</b>";
        }
        //====================================================

?>
