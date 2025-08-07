<?php
// communications.php

require_once '../controllers/CommunicationController.php';

$communicationController = new CommunicationController();
$messages = $communicationController->getAllMessages();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>Comunicación</title>
</head>
<body>
    <div class="container">
        <h1>Gestión de Comunicaciones</h1>
        <div class="message-form">
            <h2>Enviar un Mensaje</h2>
            <form action="../controllers/CommunicationController.php" method="POST">
                <input type="text" name="recipient" placeholder="Destinatario" required>
                <textarea name="message" placeholder="Escribe tu mensaje aquí..." required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="message-list">
            <h2>Mensajes Enviados</h2>
            <ul>
                <?php foreach ($messages as $message): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($message['recipient']); ?>:</strong>
                        <?php echo htmlspecialchars($message['content']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <script src="/public/js/app.js"></script>
</body>
</html>