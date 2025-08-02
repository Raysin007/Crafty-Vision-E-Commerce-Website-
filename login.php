<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password
    $email = $_POST['email'];
    $user_password = $_POST['name'];

    // Prepare and execute query
    $sql = "SELECT * FROM test WHERE email = ? AND name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $user_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if match found
    if ($result->num_rows > 0) {
        // Redirect on success
        header("Location: CraftyVision.html");
        exit();
    } else {
        echo "Invalid email or password!";
    }

    $stmt->close();
}

if ($result->num_rows > 0) {
    // Redirect with email in query string
    header("Location: CraftyVision.html?email=" . urlencode($email));
    exit();
}


$conn->close();
?>
