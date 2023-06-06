<?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: dashboard");
        exit();
    }
?>
<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("185.249.224.52","u667008371_VENDAX","Vendax2022","u667008371_VENDAX");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // User logs in with valid credentials
    if ($login_successful) {
        // Generate a unique token
        $token = generateToken();

        // Store the token in the database along with the user's ID
        storeTokenInDatabase($userId, $token);

        // Set a cookie with the token and expiration time
        setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/');
    }

    // On subsequent requests
    if (isset($_COOKIE['remember_me'])) {
        $token = $_COOKIE['remember_me'];

        // Retrieve the token from the database and verify it
        $userId = getUserIdFromToken($token);

        if ($userId) {
            // Log the user in
            loginUser($userId);

            // Refresh the cookie with a new expiration time
            setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/');
        } else {
            // Require the user to log in again
            redirectToLoginPage();
        }
    }

    // Function to generate a unique token
    function generateToken() {
        // Generate a random string or use a more secure method
        $token = bin2hex(random_bytes(16));
        return $token;
    }

    // Function to store the token in the database
    function storeTokenInDatabase($userId, $token) {
        global $con;

        $stmt = $con->prepare("INSERT INTO tokens (user_id, token) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $token);
        $stmt->execute();
        $stmt->close();
    }

    // Function to retrieve the user ID from the token in the database
    function getUserIdFromToken($token) {
        global $con;

        $stmt = $con->prepare("SELECT user_id FROM tokens WHERE token = ? LIMIT 1");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        if ($userId) {
            return $userId;
        } else {
            return false;
        }
    }

    // Function to log in the user
    function loginUser($userId) {
        // Log the user in
        // Implement your login logic here
    }

    // Function to redirect the user to the login page
    function redirectToLoginPage() {
        // Redirect the user to the login page
        // Implement your redirect logic here
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ForbbdenX Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="./style.css">
  <style>
    body {
      background: #121212 url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMOJ8RjJ87DGpCAq486OuCy8G3mc85I-KNFA&usqp=CAU) center/cover no-repeat fixed;
      background-repeat: no-repeat;
      font: 1em/1.618 Mulish, sans-serif;
    }
  </style>
</head>
<body>
  <!-- partial:index.partial.html -->
  <div class="min-h-screen [ p-4 md:p-6 lg:p-8 ] [ flex justify-center items-center ]">
    <form class="max-w-sm [ p-8 md:p-10 lg:p-10 ] bg-gradient-to-b from-black/80 to-black/40 text-[#fff] backdrop-blur-lg border-[1px] border-solid border-white border-opacity-10 rounded-2xl shadow-[0_0_20px_10px_rgba(0,0,0,0.75)]" method="POST" action="">
      <h3 class="text-md text-[#fff]/80 mb-1">Login required!</h3>
      <h1 class="text-xl md:text-2xl lg:text-2xl mb-6 uppercase font-bold">Welcome back!</h1>
      <p class="mb-6 text-sm text-[#fff]/60 text-opacity-50">Enter a valid username &amp; password in the fields below to get started. Don't have an account yet? <a style="color: #8F5FE7" href="/signup">Sign up</a></p>
    <?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: dashboard");
        exit();
    }
?>
<?php
    require('db.php');
    session_start();
    
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check if the user exists in the database
        $query = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            // Compare the entered password with the stored password
            if ($password == $row['password']) {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: dashboard");
            } else {
                echo "<div class='form'>
                      <h3>Incorrect Password.</h3>
                          </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username.</h3><br/>
                            </div>";
        }
    } 
?>

      <label class="relative text-[#fff]/50 focus-within:text-[#fff]/70 block mb-4 ">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="transition pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3" fill="none" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c-3.04 0-5.5 2.46-5.5 5.5 0 1.84 1.13 3.43 2.76 4.12-.05.34-.26 1.64-.26 1.64-.27.94-1.58 2.01-1.58 2.01l-.12.13c-.78.78-.78 2.05 0 2.83l.36.36c.78.78 2.05.78 2.83 0l.13-.12s1.07-1.31 2.01-1.58c0 0 1.3-.21 1.64-.26.69 1.63 2.28 2.76 4.12 2.76 3.04 0 5.5-2.46 5.5-5.5 0-3.04-2.46-5.5-5.5-5.5zm0 9a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
<input type="username" name="username" id="username" placeholder="Username" class="form-input transition-colors duration-200 py-3 pr-3 md:py-4 md:pr-4 lg:py-4 lg:pr-4 w-full bg-[#fff]/10 text-white focus:bg-[#fff]/20 focus:shadow-sm focus:outline-none leading-none placeholder-gray-400 appearance-none block pl-12 rounded-lg ">
      </label>
      <label class="relative text-[#fff]/50 focus-within:text-[#fff]/70 block mb-4 ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="transition pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 20 20" fill="currentColor">
          <g fill="none">
            <path d="M0 0h24v24H0V0z" />
            <path d="M0 0h24v24H0V0z" opacity=".87" />
          </g>
          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
        </svg>
        <input type="password" name="password" id="password" placeholder="Password" class="form-input transition-colors duration-200 py-3 pr-3 md:py-4 md:pr-4 lg:py-4 lg:pr-4 w-full bg-[#fff]/10 text-white focus:bg-[#fff]/20 focus:shadow-sm focus:outline-none leading-none placeholder-gray-400 appearance-none block pl-12 rounded-lg ">
      </label>

      <button name="submit" type="submit" class="p-3 md:p-4 focus:outline-none lg:p-4 transition-colors duration-500 bg-[#8F5FE7]  hover:bg-[#C7BDF9] w-full rounded-lg font-bold text-white">Log in</button>
    </form>
  </div>
  <!-- partial -->
</body>
</html>
