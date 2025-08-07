<?php
// donations.php

require_once '../controllers/DonationController.php';

$donationController = new DonationController();
$donations = $donationController->getAllDonations();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Donaciones</title>
</head>
<body>
    <header>
        <h1>Gestión de Donaciones</h1>
    </header>
    <main>
        <section>
            <h2>Lista de Donaciones</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Donante</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donations as $donation): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donation['id']); ?></td>
                            <td><?php echo htmlspecialchars($donation['donor_name']); ?></td>
                            <td><?php echo htmlspecialchars($donation['amount']); ?></td>
                            <td><?php echo htmlspecialchars($donation['date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Realizar una Donación</h2>
            <form action="../controllers/DonationController.php" method="POST">
                <label for="donor_name">Nombre del Donante:</label>
                <input type="text" id="donor_name" name="donor_name" required>
                
                <label for="amount">Monto:</label>
                <input type="number" id="amount" name="amount" required>
                
                <button type="submit">Donar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cielo Planner Pro. Todos los derechos reservados.</p>
    </footer>
    <script src="/js/app.js"></script>
</body>
</html>