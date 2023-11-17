<?php

/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../../vendor/autoload.php'; */

include_once "../../connection.php";


$id = $_GET['id'];
$email = $_GET['emailUser'];
$typeRoom = $_GET['typeroom'];

$sql = "UPDATE accommodation SET status='Reservado' WHERE Id_hospedagem=:id";

try {
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    /* $mail = new PHPMailer(true);
    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'santuariodosviagantes012@gmail.com';
    $mail->Password   = 'santuario123456';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPDebug = 2;
    // Define o remetente
    $mail->setFrom('santuariodosviagantes012@gmail.com');
    // Define o destinatário
    $mail->addAddress($email);
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Assunto';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();
    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensagem enviada.';
    } */

    header("Location: " . $_SERVER['HTTP_REFERER'] . "");





    exit();
} catch (PDOException $e) {
    echo "Erro ao executar a atualização: " . $e->getMessage();
} 