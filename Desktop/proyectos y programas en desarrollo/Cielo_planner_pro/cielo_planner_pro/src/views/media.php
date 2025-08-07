<?php
// media.php - View for displaying and managing multimedia resources

// Include necessary files
require_once '../controllers/MediaController.php';
$mediaController = new MediaController();

// Fetch multimedia resources
$mediaList = $mediaController->getAllMedia();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">
    <title>Multimedia Resources</title>
</head>
<body>
    <header>
        <h1>Multimedia Resources</h1>
        <nav>
            <ul>
                <li><a href="events.php">Events</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="donations.php">Donations</a></li>
                <li><a href="communications.php">Communications</a></li>
                <li><a href="media.php">Media</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Available Multimedia</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Upload Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mediaList as $media): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($media['id']); ?></td>
                            <td><?php echo htmlspecialchars($media['title']); ?></td>
                            <td><?php echo htmlspecialchars($media['type']); ?></td>
                            <td><?php echo htmlspecialchars($media['upload_date']); ?></td>
                            <td>
                                <a href="edit_media.php?id=<?php echo $media['id']; ?>">Edit</a>
                                <a href="delete_media.php?id=<?php echo $media['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Upload New Multimedia</h2>
            <form action="../controllers/MediaController.php?action=upload" method="post" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="video">Video</option>
                    <option value="audio">Audio</option>
                    <option value="image">Image</option>
                </select>
                
                <label for="file">File:</label>
                <input type="file" id="file" name="file" required>
                
                <button type="submit">Upload</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cielo Planner Pro. All rights reserved.</p>
    </footer>
</body>
</html>