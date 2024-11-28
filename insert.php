<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Pilot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Insert New Pilot</h1>
    <div class="container">
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="firstName">First Name</label>
                <input type="text" name="first_name">
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name">
            </p>
            <p>
                <label for="yearsOfExperience">Years of Experience</label>
                <input type="number" name="years_of_experience">
            </p>
            <p>
                <label for="licenseType">License Type</label>
                <input type="text" name="license_type">
            </p>
            <p>
                <label for="favoriteAirplane">Favorite Airplane</label>
                <input type="text" name="favorite_airplane">
            </p>
            <p>
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality">
            </p>
            <p>
                <label for="age">Age</label>
                <input type="number" name="age">
            </p>
            <p>
                <label for="contactNumber">Contact Number</label>
                <input type="text" name="contact_number">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" name="email">
            </p>
            <p>
                <label for="certifications">Certifications</label>
                <input type="text" name="certifications">
            </p>
            <p>
                <input type="submit" name="insertPilotBtn" value="Add Pilot">
            </p>
        </form>
    </div>
</body>
</html>