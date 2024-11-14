<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recebe os dados do formulário
  $name = htmlspecialchars($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars($_POST["subject"]);
  $message = htmlspecialchars($_POST["message"]);

  // Endereço de e-mail para onde será enviado
  $to = "tiddlimppg@gmail.com";
  $headers = "From: $email" . "\r\n" .
             "Reply-To: $email" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  // Envio do e-mail
  if (mail($to, $subject, $message, $headers)) {
    echo "OK"; // Mensagem de sucesso para o AJAX
  } else {
    echo "Erro ao enviar e-mail.";
  }
}
?>
