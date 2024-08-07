<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store form data in session variables
    $_SESSION["username"] = htmlspecialchars($_POST["username"]);
    $_SESSION["email"] = htmlspecialchars($_POST["email"]);
    
    // Redirect to the same page to display the session data
    header("Location: index.php");
    exit();
}

// Check if the logout request is made
if (isset($_GET['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the same page to show the form
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .container h2 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .session-data {
            margin-top: 20px;
            padding: 20px;
            background-color: #e9ffe9;
            border: 1px solid #c3e6c3;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .session-data h2 {
            margin-top: 0;
            color: #155724;
        }
        .logout-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION["username"]) && isset($_SESSION["email"])): ?>
            <div class="session-data">
                <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
                <p>Your email address is: <?php echo $_SESSION["email"]; ?></p>
                <a href="index.php?logout=true" class="logout-button">Logout</a>
            </div>
        <?php else: ?>
            <h2>Enter Your Details</h2>
            <form method="post" action="index.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
