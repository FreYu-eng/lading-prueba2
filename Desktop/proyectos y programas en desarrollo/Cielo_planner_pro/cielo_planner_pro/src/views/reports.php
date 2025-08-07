<?php
// reports.php

require_once '../controllers/ReportController.php';

$reportController = new ReportController();
$reports = $reportController->getAllReports();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Reportes</title>
</head>
<body>
    <div class="container">
        <h1>Reportes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($report['id']); ?></td>
                        <td><?php echo htmlspecialchars($report['title']); ?></td>
                        <td><?php echo htmlspecialchars($report['description']); ?></td>
                        <td><?php echo htmlspecialchars($report['date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>