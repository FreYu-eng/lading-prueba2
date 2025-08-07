<?php
// events.php

require_once '../controllers/EventController.php';

$eventController = new EventController();
$events = $eventController->getAllEvents();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Gestión de Eventos</title>
</head>
<body>
    <header>
        <h1>Eventos</h1>
        <a href="create_event.php">Crear Evento</a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo htmlspecialchars($event['id']); ?></td>
                    <td><?php echo htmlspecialchars($event['title']); ?></td>
                    <td><?php echo htmlspecialchars($event['date']); ?></td>
                    <td>
                        <a href="edit_event.php?id=<?php echo htmlspecialchars($event['id']); ?>">Editar</a>
                        <a href="delete_event.php?id=<?php echo htmlspecialchars($event['id']); ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cielo Planner Pro</p>
    </footer>
    <script src="../../public/js/app.js"></script>
</body>
</html>