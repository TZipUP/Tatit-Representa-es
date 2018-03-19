<?php
//Variáveis

  date_default_timezone_set('America/Sao_Paulo');

  $nome = $_POST['name'];
  $email = $_POST['email'];
  $telefone = $_POST['phone'];
  $mensagem = $_POST['message'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');
  $arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Arial;
  font-size:14px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' >
          <tr>
            <td width='500'><b>Contato pelo site - $data_envio $hora_envio</b></td>
            <tr>
              <td width='500'>Nome: <b>$nome</b></td>
            </tr>
            <tr>
              <td width='320'>E-mail: <b>$email</b></td>
            </tr>
            <tr>
              <td width='320'>Telefone: <b>$telefone</b></td>
            </tr>
            <tr>
              <td width='320'>Mensagem: <b>$mensagem</b></td>
            </tr>
          </tr>
        </table>
    </html>
  ";
  $arquivo2 = "
    <style type='text/css'>
      body {
        margin:0px;
        font-family:Arial;
        font-size:14px;
        color: #666666;
      }
      a{
        color: #666666;
        text-decoration: none;
      }
      a:hover {
        color: #FF0000;
        text-decoration: none;
      }
    </style>
    <html>
      <p>Olá <b>$nome</b>.</p>
      <p>Agradecemos o seu contato no site Tatit Representações Comerciais, enviado no dia $data_envio às $hora_envio:</p>
      <p><i>$mensagem</i></p>
      <p>Responderemos você o mais rápido possível!</p>
      <p>Essa é uma mensagem automática! Por favor não responda.</p>
    </html>
  ";

    // SITE > CONTATO
   $emailenviar = $email;
   $destino = "contato@tatitrepresentacoes.com.br";
   $assunto = $nome . " | Contato pelo Site";

   // É necessário indicar que o formato do e-mail é html
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
   $headers .= 'From: '.$nome. '<'.$email.'>';
   //$headers .= "Bcc: $EmailPadrao\r\n";

   $enviaremail = mail($destino, $assunto, $arquivo, $headers);
   if($enviaremail){
    // SITE > USUÁRIO
    $emailenviar2 = "no_reply@tatitrepresentacoes.com.br";
    $destino2 = $email;
    $assunto2 = "Contato pelo site";

    $headers2 = 'MIME-Version: 1.0' . "\r\n";
    $headers2.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers2.= 'From: Tatit Representacões Comerciais <no_reply@tatitrepresentacoes.com.br>';

    $enviaremail2 = mail($destino2, $assunto2, $arquivo2, $headers2);

    header("Location: http://tatitrepresentacoes.com.br/mail");

    };
?>
