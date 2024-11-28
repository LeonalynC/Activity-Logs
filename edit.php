<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 

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
    <title>Edit Pilot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Pilot</h1>
    <div class="container">
        <form action="core/handleForms.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="POST">
            <p>
                <label for="firstName">First Name</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>">
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>">
            </p>
            <p>
                <label for="yearsOfExperience">Years of Experience</label>
                <input type="number" name="years_of_experience" value="<?php echo htmlspecialchars($getUserByID['years_of_experience']); ?>">
            </p>
            <p>
                <label for="licenseType">License Type</label>
                <input type="text" name="license_type" value="<?php echo htmlspecialchars($getUserByID['license_type']); ?>">
            </p>
            <p>
                <label for="favoriteAirplane">Favorite Airplane</label>
                <input type="text" name="favorite_airplane" value="<?php echo htmlspecialchars($getUserByID['favorite_airplane']); ?>">
            </p>
            <p>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" value="<?php echo htmlspecialchars($getUserByID['nationality']); ?>">
            </p>
            <p>
                <label for="age">Age</label>
                <input type="number" name="age" value="<?php echo htmlspecialchars($getUserByID['age']); ?>">
            </p>
            <p>
                <label for="contactNumber">Contact Number</label>
                <input type="text" name="contact_number" value="<?php echo htmlspecialchars($getUserByID['contact_number']); ?>">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($getUserByID['email']); ?>">
            </p>
            <p>
                <label for="certifications">Certifications</label>
                <input type="text" name="certifications" value="<?php echo htmlspecialchars($getUserByID['certifications']); ?>">
            </p>
            <p>
                <input type="submit" name="editPilotBtn" value="Save Changes">
            </p>
        </form>
    </div>
</body>
</html>