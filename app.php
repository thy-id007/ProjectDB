<?php // FILE: index.php (The Body)

// Include the header file
include 'header.php';

// Initialize a variable to hold messages
$message = '';

// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form submission
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // --- Basic Server-Side Validation ---
    if (!empty($username) && !empty($password)) {
        // For this demonstration, we'll just check for a specific value
        if ($username === 'Subscribe :)' && $password === 'password') {
            $message = '<div class="message success">Login successful! Welcome.</div>';
        } else {
            $message = '<div class="message error">Invalid username or password.</div>';
        }
    } else {
        $message = '<div class="message error">Please fill in both fields.</div>';
    }
}
?>

    <div class="login-wrapper">
        <!-- The form itself is placed inside the wrapper to be on top of the glow -->
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>
                <!-- SVG for play/forward icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line></svg>
                LOGIN
                <!-- SVG for heart icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#ff45a2" stroke="#ff45a2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 10px;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </h2>

            <!-- Display PHP messages here -->
            <?php echo $message; ?>

            <div class="input-group">
                <input type="text" name="username" required>
                <label>Subscribe :)</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>••••••••••</label>
            </div>
            
            <button type="submit" class="submit-btn">Sign In</button>

            <div class="links">
                <a href="#">Forgot Password</a>
                <a href="#" class="signup">Sign up</a>
            </div>
        </form>
    </div>

<?php
// Include the footer file
include 'footer.php';
?>
