<?php // FILE: register.php

// Include the header for consistent styling
include 'header.php';

// Include the database configuration
include 'db_config.php';

$message = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // --- IMPORTANT: HASH THE PASSWORD ---
        // We use PHP's built-in function to create a secure hash of the password.
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert the new user. We use a prepared statement with '?'
        // as placeholders to prevent SQL injection attacks.
        $sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
        $params = array($username, $password_hash);

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // Check for a unique constraint violation (username already exists)
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    if ($error['SQLSTATE'] == "23000") {
                        $message = '<div class="message error">This username is already taken.</div>';
                    } else {
                        $message = '<div class="message error">An error occurred.</div>';
                        // Log the detailed error for the admin, don't show the user
                        // error_log(print_r($error, true)); 
                    }
                }
            }
        } else {
            $message = '<div class="message success">Registration successful! You can now log in.</div>';
        }

        // Clean up the statement resource
        sqlsrv_free_stmt($stmt);
    } else {
        $message = '<div class="message error">Please fill in all fields.</div>';
    }
}
?>

    <div class="login-wrapper">
        <form class="login-form" action="register.php" method="post">
            <h2>
                REGISTER
            </h2>

            <?php echo $message; ?>

            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            
            <button type="submit" class="submit-btn">Register</button>

            <div class="links" style="justify-content: center;">
                <a href="index.php">Already have an account? Login</a>
            </div>
        </form>
    </div>

<?php
// Include the footer
include 'footer.php';
?>
