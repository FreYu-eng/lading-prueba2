<?php
// members.php

// Include necessary files
require_once '../controllers/MemberController.php';

// Create an instance of the MemberController
$memberController = new MemberController();

// Fetch members from the database
$members = $memberController->getAllMembers();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Gestión de Miembros</title>
</head>
<body>
    <div class="container">
        <h1>Gestión de Miembros</h1>
        <button onclick="document.getElementById('addMemberModal').style.display='block'">Agregar Miembro</button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?php echo $member['id']; ?></td>
                        <td><?php echo $member['name']; ?></td>
                        <td><?php echo $member['email']; ?></td>
                        <td><?php echo $member['phone']; ?></td>
                        <td>
                            <button onclick="editMember(<?php echo $member['id']; ?>)">Editar</button>
                            <button onclick="deleteMember(<?php echo $member['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Member Modal -->
    <div id="addMemberModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addMemberModal').style.display='none'">&times;</span>
            <h2>Agregar Miembro</h2>
            <form id="addMemberForm">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Teléfono:</label>
                <input type="text" id="phone" name="phone" required>
                <button type="submit">Agregar</button>
            </form>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>