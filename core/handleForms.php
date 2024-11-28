<?php  
require_once 'models.php';

if (isset($_POST['registerBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    registerUser($pdo, $username, $password);
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (loginUser($pdo, $username, $password)) {
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['message'] = 'Invalid credentials';
        header("Location: ../login.php");
        exit();
    }
}

if (isset($_POST['insertPilotBtn'])) {
    $data = [
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['years_of_experience'],
        $_POST['license_type'],
        $_POST['favorite_airplane'],
        $_POST['nationality'],
        $_POST['age'],
        $_POST['contact_number'],
        $_POST['email'],
        $_POST['certifications'],
        $_SESSION['username'] 
    ];
    $result = insertNewPilot($pdo, $data);
    logActivity($pdo, $_SESSION['user_id'], 'Insert', 'Inserted new pilot: ' . $_POST['first_name']);
    handleResult($result, '../index.php');
}

if (isset($_POST['editPilotBtn'])) {
    $data = [
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['years_of_experience'],
        $_POST['license_type'],
        $_POST['favorite_airplane'],
        $_POST['nationality'],
        $_POST['age'],
        $_POST['contact_number'],
        $_POST['email'],
        $_POST['certifications'],
        $_SESSION['username'], 
        $_GET['id']
    ];
    $result = editPilot($pdo, $data);
    logActivity($pdo, $_SESSION['user_id'], 'Update', 'Updated pilot ID: ' . $_GET['id']);
    handleResult($result, '../index.php');
}

if (isset($_POST['deletePilotBtn'])) {
    $result = deletePilot($pdo, $_GET['id']);
    logActivity($pdo, $_SESSION['user_id'], 'Delete', 'Deleted pilot ID: ' . $_GET['id']);
    handleResult($result, '../index.php');
}

if (isset($_GET['logoutUserBtn'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}

function handleResult($result, $redirectURL) {
    $_SESSION['message'] = $result['message'];
    $_SESSION['status'] = $result['statusCode'];
    header("Location: $redirectURL");
}
?>