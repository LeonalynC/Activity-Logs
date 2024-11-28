<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php';

$getUserByID = getUserByID($pdo, $_GET['id']);
if (!$getUserByID) {
    echo "No pilot found with ID: " . htmlspecialchars($_GET['id']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pilot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Are you sure you want to delete this pilot?</h1>
    <div class="container" style="border-style: solid; border-color: red; background-color: #ffcbd1;">
        <h2>First Name: <?php echo htmlspecialchars($getUserByID['first_name']); ?></h2>
        <h2>Last Name: <?php echo htmlspecialchars($getUserByID['last_name']); ?></h2>
        <h2>Email: <?php echo htmlspecialchars($getUserByID['email']); ?></h2>
      
        <div class="deleteBtn" style="text-align: center;">
            <form action="core/handleForms.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="POST">
                <input type="submit" name="deletePilotBtn" value="Delete" style="background-color: #f69697; border-style: solid;">
            </form>
        </div>
    </div>
</body>
</html>