<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
include_once '../../connection.php';

$email = $_GET["emailUser"];
$typeRoom = $_GET["typeroom"];
$idUser = $_GET["iduser"];
$idReserva = $_GET['id'];

$sqlUser = "SELECT * FROM users WHERE id = $idUser";

$statementUser = $pdo->prepare($sqlUser);
$statementUser->execute();

$user = $statementUser->fetch(PDO::FETCH_ASSOC);

$sqlReserva = "SELECT * FROM accommodation WHERE Id_hospedagem = $idReserva";

$statementReserva = $pdo->prepare($sqlReserva);
$statementReserva->execute();

$reserva = $statementReserva->fetch(PDO::FETCH_ASSOC);

var_dump($reserva);

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'playerthiago86@gmail.com';
    $mail->Password   = 'cawhsyiaoazvomqr';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->CharSet = 'utf8';

    $mail->setFrom('playerthiago86@gmail.com', 'Santuário dos Viajantes');
    $mail->addAddress($email, 'Joe User');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmação de Reserva - Santuário dos Viajantes';
    $mail->Body    = "
    
    <h3>Prezado {$user['name']},</h3>

    <p>É com prazer que confirmamos a sua reserva no Santuário dos Viajantes. Estamos ansiosos para recebê-lo e proporcionar uma estadia memorável. Abaixo, você encontrará os detalhes da sua reserva:</p>
    
    <ul> 
        <li>Nome do Hotel: Santuário dos Viajantes</li>
        <li>Data de Check-in: {$reserva['date_check_in']}</li>
        <li>Data de Check-out: {$reserva['date_check_out']}</li>
        <li>Número de Hóspedes: Número de adultos {$reserva['num_adult']}, crianças {$reserva['num_children']}</li>
        <li>Tipo de Quarto: {$typeRoom}</li>
        <li>Tarifa Total: {$reserva['price']}</li>
    </ul>

    <p>Lembre-se de que estas informações estão sujeitas a confirmação no momento do check-in. Recomendamos que revise os detalhes da sua reserva para garantir que estejam corretos. Caso haja alguma discrepância ou se precisar de assistência adicional, não hesite em entrar em contato conosco.</p>    
    
    <p>Pedimos que esteja ciente das políticas de cancelamento do hotel e, se necessário, faça quaisquer alterações com antecedência. Caso tenha alguma solicitação especial ou requisito dietético, por favor, informe-nos com antecedência para que possamos fazer os devidos arranjos.</p>
    
    <p>Agradecemos por escolher o Santuário dos Viajantes e estamos ansiosos para recebê-lo em breve. Tenha uma viagem segura até aqui!</p>
    
    <p>Atenciosamente,<p>
    
    [Seu Nome]
    [Seu Cargo]
    Santuário dos Viajantes
    [Seus Detalhes de Contato]";

    $mail->send();

    $sqlAlterReserva = "UPDATE accommodation SET status='Reservado' WHERE Id_hospedagem=:id";

    $statementeReservaUpdate = $pdo->prepare($sqlAlterReserva);

    $statementeReservaUpdate->bindParam(':id', $idReserva, PDO::PARAM_INT);

    $statementeReservaUpdate->execute();

    header("Location: " . $_SERVER['HTTP_REFERER'] . "");

    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
