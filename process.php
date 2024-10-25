<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "chatbot");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$user_input = $_POST['user_input'];

// SQL query to fetch bot reply based on user input
$sql = "SELECT bot_reply FROM responses WHERE user_input = '$user_input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output bot reply if a match is found
    $row = $result->fetch_assoc();
    echo "Bot: " . $row['bot_reply'];
} else {
    echo "Bot: I don't understand that.";
}

$conn->close();
?>
