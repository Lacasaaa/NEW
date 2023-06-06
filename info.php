<?php
include('db.php');
// Retrieve the list of users from the database
$query = "SELECT u.id, u.username, IF(v.user_id IS NOT NULL, 1, 0) AS is_vip
          FROM users u
          LEFT JOIN vip_users v ON u.id = v.user_id";
// Execute the query and fetch the result using MySQLi or PDO

// Display the list of users in a table or any desired format
foreach ($result as $row) {
    $userId = $row['id'];
    $username = $row['username'];
    $isVip = $row['is_vip'];
    
    // Display the user's information and an option to mark them as VIP in the admin interface
    echo "$userId | $username | VIP: ";
    echo ($isVip == 1) ? "Yes" : "No";
    echo "<input type='checkbox' name='vip_users[]' value='$userId' />";
}
?>