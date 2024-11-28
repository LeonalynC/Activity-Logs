<?php  
require_once 'core/models.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="tableClass">
        <h2>Activity Logs</h2>
        <table style="width: 100%;" cellpadding="20">
            <tr>
                <th>Log ID</th>
                <th>Action</th>
                <th>Details</th>
                <th>Performed By</th>
                <th>Date</th>
            </tr>
            <?php $getAllActivityLogs = getAllActivityLogs($pdo); ?>
            <?php foreach ($getAllActivityLogs as $row) { ?>
            <tr>
                <td><?php echo $row['activity_log_id']; ?></td>
                <td><?php echo $row['action']; ?></td>
                <td><?php echo $row['details']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['date_added']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>