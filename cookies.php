<!DOCTYPE html>
<html>
<head>
    <title>Cookie Example</title>
</head>
<body>

<?php
// Start the session (if needed)
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the form data
    $username = htmlspecialchars($_POST['username']);

    // Set a cookie named "username" with the submitted value that expires in 1 hour
    setcookie("username", $username, time() + 3600, "/");

    // Redirect to the same page to see the cookie
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Check if the delete button has been clicked
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Delete the cookie by setting it to expire in the past
    setcookie("username", "", time() - 3600, "/");

    // Redirect to the same page to see the cookie is deleted
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<?php
// Check if the cookie "username" is set and display its value
if (isset($_COOKIE["username"])) {
    echo "<p>Hello, " . $_COOKIE["username"] . "</p>";
    echo "<a href='?action=delete'>Delete Cookie</a>";
} else {
    echo "<p>Hello, Guest</p>";
}
?>

<!-- Form to submit the username -->
<form action="" method="post">
    <label for="username">Enter your name:</label>
    <input type="text" id="username" name="username" required>
    <input type="submit" value="Submit">
</form>

</body>
</html>
