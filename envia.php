<?php

// Destinatário
$para = "leonardo@giongoengenharia.com.br";

// Assunto do e-mail
$assunto = "Contato do através do site ...";

// Campos do formulário de contato
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['conteudo'];

// Monta o corpo da mensagem com os campos
$corpo = "<html><body>"."\r\n";
$corpo .= "Nome: $nome "."\r\n";
$corpo .= "Email: $email Telefone: $telefone Mensagem: $mensagem"."\r\n";
$corpo .= "</body></html>";

// Cabeçalho do e-mail
$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

//Verifica se os campos estão preenchidos para enviar então o email
if (!empty($nome) && !empty($email) && !empty($mensagem)) {
    mail($para, $assunto, $corpo, $email_headers);
    $msg = "Sua mensagem foi enviada com sucesso.";
    echo "<script>alert('$msg');window.location.assign('https://giongoengenharia.com.br/contato.html');</script>";
} else {
    $msg = "Erro ao enviar a mensagem.";
    echo "<script>alert('$msg');window.location.assign('https://giongoengenharia.com.br/contato.html');</script>";
}