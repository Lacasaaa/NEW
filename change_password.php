<?php
// Include the necessary files
require('db.php');
include("auth_session.php");

// Process the form submission
if (isset($_POST['submit'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Retrieve the current password from the database
    $username = $_SESSION['username'];
    $query = "SELECT password FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    // Compare the current password with the stored password
    if ($currentPassword === $storedPassword) {
        // Check if the new password and confirm password match
        if ($newPassword === $confirmPassword) {
            // Update the password in the database
            $query = "UPDATE users SET password='$newPassword' WHERE username='$username'";
            mysqli_query($con, $query);
            echo "Password updated successfully.";
        } else {
            echo "New password and confirm password do not match.";
        }
    } else {
        echo "Incorrect current password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
        
        <h2>Change Password</h2>
        <form action="" method="post">
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <input type="submit" name="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
