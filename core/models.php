<?php  
require_once 'dbConfig.php';

function getAllActivityLogs($pdo) {
    $sql = "SELECT al.id as activity_log_id, al.action, al.details, ua.username, al.date_added 
            FROM activity_logs al 
            JOIN user_accounts ua ON al.user_id = ua.id 
            ORDER BY al.date_added DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllUsers($pdo) {
    $sql = "SELECT * FROM user_accounts";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function registerUser($pdo, $username, $password) {
    $sql = "INSERT INTO user_accounts (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT)]);
}

function loginUser($pdo, $username, $password) {
    $sql = "SELECT * FROM user_accounts WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    return false;
}

function insertNewPilot($pdo, $data) {
    $sql = "INSERT INTO pilot_applicants (first_name, last_name, years_of_experience, license_type, favorite_airplane, nationality, age, contact_number, email, certifications, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute($data);

    return $executeQuery ? ['message' => 'Pilot added successfully', 'statusCode' => 200] : ['message' => 'Failed to add pilot', 'statusCode' => 400];
}

function editPilot($pdo, $data) {
    $sql = "UPDATE pilot_applicants SET first_name = ?, last_name = ?, years_of_experience = ?, license_type = ?, favorite_airplane = ?, nationality = ?, age = ?, contact_number = ?, email = ?, certifications = ?, last_updated = CURRENT_TIMESTAMP, last_updated_by = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute($data);

    return $executeQuery ? ['message' => 'Pilot updated successfully', 'statusCode' => 200] : ['message' => 'Failed to update pilot', 'statusCode' => 400];
}

function deletePilot($pdo, $id) {
    $sql = "DELETE FROM pilot_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    return $executeQuery ? ['message' => 'Pilot deleted successfully', 'statusCode' => 200] : ['message' => 'Failed to delete pilot', 'statusCode' => 400];
}

function getUserByID($pdo, $id) {
    $sql = "SELECT * FROM pilot_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function searchForPilot($pdo, $searchQuery) {
    $sql = "SELECT * FROM pilot_applicants WHERE CONCAT_WS(' ', first_name, last_name, years_of_experience, license_type, favorite_airplane, nationality, age, contact_number, email, certifications) LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%" . $searchQuery . "%"]);
    return $stmt->fetchAll();
}

function logActivity($pdo, $user_id, $action, $details) {
    $sql = "INSERT INTO activity_logs (user_id, action, details) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $action, $details]);
}
?>