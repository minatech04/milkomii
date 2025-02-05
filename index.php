<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';



require_once "vendor/autoload.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$status = '';
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data from the POST request
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];



 

try {
    //Server settings
                      //Enable verbose debug output
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
      );
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'MilkomiWeb@gmail.com';                     //SMTP username
    $mail->Password   = 'vgwxubuqjvbszmqg';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('MilkomiWeb@gmail.com', 'Milkomi Website');
    $mail->addAddress('milkomieducationconsultancy@gmail.com', 'Adnan');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'A message from your website';
    
    $body = '
    <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; border: none; max-width: 600px; margin: 0 auto;">
        <tr>
            <td style="background-color: #f4f4f4; padding: 20px;">
                <h2 style="color: #333; margin: 0;">A message from your website</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="margin: 0 0 10px 0;">Name: ' . $name . '</p>
                <p style="margin: 0 0 10px 0;">Email: ' . $email . '</p>
                <p style="margin: 0;">Message:</p>
                <p style="margin: 0 0 20px 0;">' . $message . '</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #333; color: #fff; text-align: center; padding: 10px;">
                <p style="margin: 0;">This message was sent from your website.</p>
            </td>
        </tr>
    </table>
    ';
    
    $mail->Body = $body;
   

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
    $status = 'Message has been sent';
    header("refresh:2");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $status = 'Message could not be sent. Please try again later';
    header("refresh:2");
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="./styles/styles.css">
    <title>Milkomii Consultancy</title>
</head>
<body>
    <header class="text-emerald-900 bg-emerald-50 lg:h-screen">
        <div class=" flex md:flex-row flex-col md:justify-around py-2 pl-3 lg:pl-0">
          <!-- <div class="flex gap-2 self-stretch px-2 my-auto text-base leading-6">
            <div>
                <div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4e4afe216a315f3d226d6add125b1ce278e7914be5154db95593acfe3e34e97c?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="shrink-0 aspect-[1.32] w-[42px]" alt="Milkomii Consultancy Logo" />
                    <div class="my-auto">MILKOMII CONSULTANCY</div>
                </div>
                <div class="col-start-12 grid content-center pr-3">
                    <button class="md:hidden" id="toggleNav" onclick="toggleNavigation()">
                      <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><!-- <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg> -->  
                  <!--   </button>
                </div>
            </div>
          </div> -->
          <div class="flex flex-row justify-between pr-3">
            <div class="grid content-center">
                <div class='flex justify-center'>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4e4afe216a315f3d226d6add125b1ce278e7914be5154db95593acfe3e34e97c?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="shrink-0 aspect-[1.32] w-[42px]" alt="Milkomii Consultancy Logo" />
                <div class="my-auto pl-2">MILKOMII CONSULTANCY</div>
                </div>
            </div>
            <div class="col-start-12 grid content-center pr-3">
              <button class="md:hidden" id="toggleNav" onclick="toggleNavigation()">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>  </path>
              </button>
            </div>
          </div>
          <nav id="menu" class="hidden md:grid content-center mt-2 md:mt-0">
            <ul class="md:flex md:flex-row flex-col gap-7">
              <li class="mb-1 font-bold text-sm text-emerald-900hover:text-green-500">
                <a href="#home" class="cursor-pointer">Home</a>
              </li>
              <li class="mb-1 font-bold text-sm text-emerald-900 hover:text-green-500">
                <a href="#about" class="cursor-pointer">About Us</a>
              </li>
              <li class="mb-1 font-bold text-sm text-emerald-900 hover:text-green-500">
                <a href='#what' class="cursor-pointer">Expertise</a>
              </li>
              <li class="mb-1 font-bold text-sm text-emerald-900 hover:text-green-500">
                <a href="#contact" class="cursor-pointer">Contact Us</a>
              </li>
            </ul>
        </nav>

          <!-- <nav class="hidden md:flex md:flex-wrap gap-5 justify-between self-stretch p-3.5 text-sm font-semibold leading-6 uppercase" id="menu">
            <a href="#" class="justify-center pt-0.5 pb-1 whitespace-nowrap border-lime-600 border-solid border-b-[3px]">Home</a>
            <a href="#">Why choose us</a>
            <a href="#">What we do</a>
            <a href="#">Contact Us</a>
          </nav> -->
         <div class="hidden md:flex md:flex-row gap-2 mt-3 md:mt-0" id="menu2">
           <!--  <a href="#contact" id="menu2" class="md:flex self-stretch px-5 py-3 my-auto text-xs leading-5 text-center rounded-lg border border-emerald-900 hover:text-white hover:bg-emerald-900 border-solid">CONTACT US</a> -->
           <button class="btn-cssbuttons">
            <span>Social Media</span><span>
              <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
              </svg>
            </span>
            <ul>
            <li>
              <a  target="_blank" href=""> <svg class="" height="18" width="18" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-tiktok" viewBox="0 0 16 16">
                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
              </svg></a>
            </li>
            <li>
              <a target="_blank" href="https://www.instagram.com/milkomi_education_consultancy?igsh=aW1jenl5YW1uN2dp">   <svg class="" height="18" width="18" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg></a>
            </li>
            <li>
              <a href="" target="_blank"><svg class="" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg></a>
            </li>
            <li>
            <a href="https://t.me/milkomieducationconsultancy" target="_blank"> <svg class="" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 496 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/></svg></a></li></ul></button>
        </div>
       <!--  <div class="card d-flex flex-row">
          <span class="disp">Socials</span>
          <a class="social-link nav-link" href="https://instagram.com/bluebesttrading?igshid=MzNlNGNkZWQ4Mg==">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#ef4c60" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
          </a>
          <a class="social-link nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#000000" class="bi bi-tiktok" viewBox="0 0 16 16">
              <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
            </svg></a>
          
          <a class="social-link nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#3f51b5" class="bi bi-facebook" viewBox="0 0 16 16">



<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>  </a>
          <a class="social-link nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#1791e8" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
            </a>
        </div> -->
          
        </div>

        <section id="home" class="grid content-center w-full h-full">
            <div class="flex flex-col-reverse lg:flex-row w-full">
              <div class="flex justify-center lg:w-2/5 w-full">
                <div class="flex justify-center">
                    <div class="flex flex-col justify-center self-stretch my-auto text-center max-w-[720px] max-md:mt-10">
                        <h1 class="md:text-5xl text-3xl font-black tracking-tighter text-emerald-900 text-ellipsis">
                          Unlock Your Future with Expert Guidance
                        </h1>
                        <p class="mt-4 md:text-2xl text-md px-7 md:px-0 text-emerald-600">
                          Providing top-notch educational consultancy services.
                        </p>
                        <a href="#what" class="justify-center items-center self-center px-6 py-4 mt-10 max-w-full text-lg leading-7 text-emerald-50 bg-lime-600 rounded-lg w-[360px] max-md:px-5">
                          Learn More
                        </a>
                    </div>
                </div>
              </div>
              <div class="flex justify-center lg:w-3/5 w-full mt-3 pl-3 md:pl-0">
                <div id="lottie-container" class="lg:w-[400px] lg:h-[400px] w-[300px] h-[300px]"></div>
              </div>
            </div>
        </section>
        </header>

      <main class="">
        <section id="about" class="flex flex-col items-center px-20 pt-20 pb-12 w-full bg-emerald-50 max-md:px-5 max-md:max-w-full">
          <div class="flex flex-col items-center px-4 max-w-full text-center text-gray-700 w-[1024px]">
            <h2 class="text-3xl leading-[48.05px]">Why choose us…</h2>
            <div class="shrink-0 mt-4 h-0.5 border-b-2 border-amber-500 border-solid w-[100px]"></div>
            <p class="self-stretch mt-4 text-xl font-light leading-8 max-md:max-w-full pb-4">
              
We are the only educational consultants in the nation offering 100% free admission assistance. We provide advice on your studies, guide you through the application process, and prepare you for your visa application—all at no cost. Our mission is to create opportunities for people who didn’t know they had them.
            </p>
          </div>
          <div class="flex flex-col px-4 pb-8 max-w-full w-[1232px]">
            <div class="max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <article class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col grow justify-center self-stretch px-px py-6 w-full bg-white rounded-md border border-solid border-neutral-200 max-md:mt-8 max-md:max-w-full">
                    <div class="flex flex-wrap gap-0 pl-4">
                      <div class="flex justify-center items-center self-start px-5 py-5 border-2 border-amber-500 border-solid rounded-[72px]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0630acdda868b625630b6adff034c563bd69211a70c450edf2378e22dd3b91db?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="w-9 aspect-[1.12]" alt="Free service icon" />
                      </div>
                      <div class="flex flex-col flex-1 px-4 leading-6 max-md:max-w-full">
                        <h3 class="text-sm font-extrabold text-amber-500 tracking-[2.24px] max-md:max-w-full">FREE</h3>
                        <p class="mt-4 text-base font-light text-slate-400 max-md:max-w-full">
                          We give free service to all our applicant students. Our
                          consultation and admission assistance till visa application
                          process will be given for free for all our students.
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col grow justify-center self-stretch px-px py-6 w-full bg-white rounded-md border border-solid border-neutral-200 max-md:mt-8 max-md:max-w-full">
                    <div class="flex flex-wrap gap-0 pl-4">
                      <div class="flex justify-center items-center self-start px-4 py-5 border-2 border-amber-500 border-solid rounded-[72px]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/76a5425444eeaa5c638a640f3488bcf2409265537384ae121cbc339ece9aa930?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="aspect-[1.32] w-[42px]" alt="Reliable service icon" />
                      </div>
                      <div class="flex flex-col flex-1 px-4 leading-6 max-md:max-w-full">
                        <h3 class="text-sm font-extrabold text-amber-500 tracking-[2.24px] max-md:max-w-full">RELIABLE</h3>
                        <p class="mt-4 text-base font-light text-slate-400 max-md:max-w-full">
                          Our process and application methods make us reliable both to
                          our students and partners. We make sure we get the best option
                          for our students
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="pt-8 max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <article class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col grow justify-center self-stretch px-px py-6 w-full bg-white rounded-md border border-solid border-neutral-200 max-md:mt-8 max-md:max-w-full">
                    <div class="flex flex-wrap gap-0 pl-4">
                      <div class="flex justify-center items-center self-start p-5 border-2 border-amber-500 border-solid rounded-[72px]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7d85577c499de3fd691eaf6129814cd8f3b708b286214dea6d98c6dbc238567b?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="w-8 aspect-square" alt="Efficient service icon" />
                      </div>
                      <div class="flex flex-col flex-1 px-4 leading-6 max-md:max-w-full">
                        <h3 class="text-sm font-extrabold text-amber-500 tracking-[2.24px] max-md:max-w-full">EFFICIENT</h3>
                        <p class="mt-4 text-base font-light text-slate-400 max-md:max-w-full">
                          Once you begin your process with us, we will send your
                          application to different platforms, partners working with us, so
                          that we would not put all our eggs in one basket.
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col justify-center self-stretch px-px py-6 w-full bg-white rounded-md border border-solid border-neutral-200 max-md:mt-8 max-md:max-w-full">
                    <div class="flex flex-wrap gap-0 pl-4">
                      <div class="flex justify-center items-center self-start p-5 border-2 border-amber-500 border-solid rounded-[72px]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/9928559a5fb543475c860c2e543e98cb0145f713351d42af1b1961b4da70b5a4?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="w-8 aspect-square" alt="Fast service icon" />
                      </div>
                      <div class="flex flex-col flex-1 px-4 leading-6 max-md:max-w-full">
                        <h3 class="text-sm font-extrabold text-amber-500 tracking-[2.24px] max-md:max-w-full">FAST</h3>
                        <p class="mt-4 text-base font-light text-slate-400 max-md:max-w-full">
                          As long as you diligently take care of your responsibilities and fulfill your part of the process, we will promptly commence the application on your behalf and ensure that you receive a reply within a matter of weeks.
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </section>
      
        <section id="what" class="flex justify-center items-center px-4 py-20 w-full bg-emerald-50 max-md:px-5 max-md:max-w-full">
          <div class="flex flex-col items-center my-1.5 max-w-full w-[1200px]">
            <h2 class="text-3xl leading-[48.05px]">What We Do</h2>
            <div class="shrink-0 mt-4 h-0.5 border-b-2 border-amber-500 border-solid w-[100px]"></div>
            <p class="mt-4 text-2xl leading-8 text-center text-emerald-600 max-md:max-w-full">
              A step-by-step guide to our consultancy process.
            </p>
            <div class="flex justify-center mt-5">
              <div class="flex md:flex-row flex-col gap-5 lg:w-4/5 w-5/6">
                <article class="flex flex-col border-slate-950 border-1 rounded-md shadow-lg pb-5">
                  <div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/eea479baaf0ec589ad99755947c0da0563d9ce61f75ed45455ebcf6d7f619f0e?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="max-w-full aspect-[1.52] w-[337px] rounded-t-md" alt="Early Advantage step illustration" />
                  </div>
                  <div class="flex flex-col grow justify-center max-w-[360px] max-md:mt-10">
                    
                    <p class="mt-4 text-1xl leading-5 text-lime-600 px-4 text-center">Step 1</p>
                    <h3 class="mt-2 text-2xl font-medium leading-10 text-center text-black text-ellipsis">
                      Early Advantage
                    </h3>
                    <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">
                      <strong class="block">A long-term approach to earning that important acceptance letter.</strong>
                      At the start of high school
                       - not in Grade 11 and certainly not in Grade 12. 
                       Early Advantage emphasizes a holistic approach to education, specifically developing a student's
                    </p>
                    <ol class="list-decimal pl-5">
                      <li>Academic Achievement,</li>
                      <li>Extracurricular Engagement, and</li>
                      <li>Personal Qualities.</li>
                    </ol>
                      <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">  Our program is built on the rubric used to assess students at top universities.</p>
                    
                  </div>
                </article>
                
                <article class="flex flex-col border-slate-950 border-1 rounded-md shadow-lg pb-5">
                  <div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/d8c324b13c34735895326983067ef215d680f6bce2362f27e8af6a68054e98d5?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="max-w-full aspect-[1.52] w-[337px] rounded-t-md" alt="Early Advantage step illustration" />
                  </div>
                  <div class="flex flex-col grow justify-center max-w-[360px] max-md:mt-10">
                    
                    <p class="mt-4 text-1xl leading-5 text-lime-600 px-4 text-center">Step 2</p>
                    <h3 class="mt-2 text-2xl font-medium leading-10 text-center text-black text-ellipsis">
                      Application Year
                    </h3>
                    <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">
                      <strong class="block">A long-term approach to earning that important acceptance letter.</strong>
                      At the start of high school
                       - not in Grade 11 and certainly not in Grade 12. 
                       Early Advantage emphasizes a holistic approach to education, specifically developing a student's
                    </p>
                    <ol class="list-decimal pl-5">
                      <li>Academic Achievement,</li>
                      <li>Extracurricular Engagement, and</li>
                      <li>Personal Qualities.</li>
                    </ol>
                      <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">  Our program is built on the rubric used to assess students at top universities.</p>
                    
                  </div>
                </article>
                <article class="flex flex-col border-slate-950 border-1 rounded-md shadow-lg pb-5">
                  <div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/6cdf7d5143e62c292ad4cb781c4133e149495a99ea9cad698d792927fcdc766d?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="max-w-full aspect-[1.52] w-[337px] rounded-t-md" alt="Early Advantage step illustration" />
                  </div>
                  <div class="flex flex-col grow justify-center max-w-[360px] max-md:mt-10">
                    
                    <p class="mt-4 text-1xl leading-5 text-lime-600 px-4 text-center">Step 3</p>
                    <h3 class="mt-2 text-2xl font-medium leading-10 text-center text-black text-ellipsis">
                      Final Review
                    </h3>
                    <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">
                      <strong class="block">A long-term approach to earning that important acceptance letter.</strong>
                      At the start of high school
                       - not in Grade 11 and certainly not in Grade 12. 
                       Early Advantage emphasizes a holistic approach to education, specifically developing a student's
                    </p>
                    <ol class="list-decimal pl-5">
                      <li>Academic Achievement,</li>
                      <li>Extracurricular Engagement, and</li>
                      <li>Personal Qualities.</li>
                    </ol>
                      <p class="mt-2 text-sm font-light leading-7 text-center text-emerald-600 text-ellipsis px-3">  Our program is built on the rubric used to assess students at top universities.</p>
                    
                  </div>
                </article>
              </div>
            </div>
          </div>
        </section>
      
      <!--   <section class="flex justify-center items-center px-4 py-12 w-full text-4xl font-black text-center bg-emerald-50 max-md:px-5 max-md:max-w-full">
          <div class="flex flex-col p-12 max-w-full bg-green-100 w-[960px] max-md:px-5">
            <h2 class="text-lime-600 leading-[130%] max-md:max-w-full">Our Mission</h2>
            <p class="mt-2 leading-10 text-emerald-600 max-md:max-w-full">
              Helping students achieve their academic and career goals through expert consultancy.
            </p>
          </div>
        </section> -->

        <div class="row featurette about-us" id="mvc">
          <div class="flex flex-col md:flex-row items-center justify-center bg-emerald-50">
    <div class="md:w-1/2 px-4 text-center">
      <h2 class="text-4xl font-bold mb-4 f1 text-cyan" style="color:#11855e">Mission</h2>
      <div class="text-lg p1">
      Our mission is to empower our local community with access to high-quality educational resources, services, and support. We are committed to delivering exceptional customer service and conducting our business with the utmost honesty and transparency. Our goals include addressing educational gaps, fostering academic excellence, and building lasting capabilities to elevate learning standards for future generations.
      </div>
    </div>
    <div class="md:w-1/2 px-4">
      <img class="w-full max-w-md mx-auto" src="./images/mission.png" alt="Generic placeholder image">
    </div>
  </div>
  
  
  <div class="flex flex-col md:flex-row justify-evenly items-center bg-emerald-50">
    <div class="md:w-1/2 md:order-2 px-4 text-center">
      <h2 class="text-4xl font-bold mb-4 f1" style="color:#11855e">Vision</h2>
      <div class="text-lg p1">
      Our vision is to be the premier education consultancy, empowering individuals and institutions to unlock their full potential. We aspire to redefine the landscape of education by delivering innovative, research-backed solutions that transform lives and drive sustainable progress. Through our expertise, we aim to inspire a future where every learner has the tools and support to thrive, ultimately contributing to the betterment of communities worldwide
      </div>
    </div>
    <div class="md:w-1/2 md:order-1 px-4">
      <img class="w-full max-w-md mx-auto" src="./images/vision.png" alt="Generic placeholder image">
    </div>
  </div>
  
  
  
  <div class="flex flex-col md:flex-row items-center justify-center about-us bg-emerald-50">
    <div class="md:w-1/2 px-4 justify-center text-center">
      <h2 class="text-4xl font-bold mb-4 f1" style="color:#11855e">Core Values</h2>
      <div class="text-lg p1">
      We are guided by core values of integrity, innovation, empowerment, collaboration, equity, and impact. These principles shape our work and interactions, as we strive to deliver transformative educational solutions that drive sustainable progress and positively transform the lives of learners and communities worldwide.
      </div>
    </div>
    <div class="md:w-1/2 px-4">
      <img class="w-full max-w-md mx-auto" src="./images/core values.png" alt="Generic placeholder image">
    </div>
  </div>
      
  <section id="contact" class="flex justify-center items-center px-4 py-20 w-full text-sm bg-emerald-50 max-md:px-5 max-md:max-w-full">
    <div class="flex flex-col justify-center items-center py-8 my-4 max-w-full bg-white rounded-[41px] w-[1024px]">
      <h2 class="self-stretch text-5xl font-black tracking-tighter text-center text-emerald-900 leading-[77.76px] max-md:max-w-full max-md:text-4xl">
        Contact Us
      </h2>
      <p class="self-stretch mt-8 text-2xl leading-8 text-center text-emerald-900 max-md:max-w-full">
        We are here to help you.
      </p>
      <form class="w-full max-w-[520px] mt-10 px-3 md:px-0" id="contact-form" onsubmit="handleSubmit()">
        <div class="mb-6">
          <label for="name" class="block text-emerald-900 leading-[160%] mb-1">Full Name</label>
          <input type="text" id="name" name="name" class="w-full p-4 text-emerald-600 bg-emerald-50 rounded-lg border border-emerald-200 leading-[160%]" placeholder="Enter your name" required />
        </div>
        <div id="error-name" class="text-rose-700 text-xs mt-1 ml-3"></div>
        <div class="mb-6">
          <label for="email" class="block text-emerald-900 leading-[160%] mb-1">Email Address</label>
          <input type="email" id="email" name="email" class="w-full p-4 text-emerald-600 bg-emerald-50 rounded-lg border border-emerald-200 leading-[160%]" placeholder="Enter your email" required />
        </div>
        <div id="error-email" class="text-rose-700 text-xs mt-1 ml-3"></div>
        <div class="mb-6">
          <div class="flex justify-between items-center mb-1">
            <label for="message" class="text-emerald-900 leading-6">Your Message</label>
          <!--   <button type="button" class="text-lime-600 leading-[160%] flex items-center">
              Add Files
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/97ddbdf6e8cb58900b14c583cab0dc7d8fa3981917298fe67284944137c90d0c?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="ml-2 w-8 h-8" alt="Add files icon" />
            </button> -->
          </div>
          <input id="message" name="message"  class="w-full p-4 text-emerald-600 bg-emerald-50 rounded-lg border border-emerald-200 leading-[160%]" placeholder="Write your message" required />
          <div id="error-message" class="text-rose-700 text-xs mt-1 ml-3">
        </div>
   
        <button type="submit" class="w-full px-6 py-4 text-center text-emerald-50 mt-5 bg-lime-600 rounded-lg leading-[160%]">
          Submit
        </button>
      </form>
    </div>
  </section>
      </main>
      
     <!--  <footer class="flex flex-col items-center px-5 pb-14 w-full bg-emerald-900 max-md:max-w-full">
        <div class="flex justify-center items-center self-stretch px-16 py-20 w-full bg-emerald-900 max-md:px-5 max-md:max-w-full">
          <div class="mt-10 mb-4 max-w-full w-[1106px]">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
              <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                <address class="flex flex-col self-stretch pb-4 my-auto text-xl not-italic max-md:mt-10 max-md:max-w-full">
                  <h3 class="font-bold text-white leading-[150%] max-md:max-w-full">Address</h3>
                  <p class="mt-2 text-white leading-[150%] max-md:max-w-full">
                    Meskel flower Rahmet Tower 4th floor #402
                  </p>
                  <div class="flex flex-wrap gap-3.5 mt-4">
                    <a href="tel:+251115589794" class="text-amber-300 leading-[100%]">+251 115 58 97 94</a>,
                    <a href="tel:+251116671376" class="text-amber-300 leading-[100%]">+251 116 67 13 76</a>,
                    <a href="tel:+251116671693" class="text-amber-300 leading-[100%]">+251 116 67 16 93</a>,
                    <a href="tel:+251942129611" class="text-amber-300 leading-[100%]">+251 942 12 96 11</a>
                  </div>
                </address>
              </div>
              <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow justify-center self-stretch w-full bg-zinc-500 max-md:mt-8 max-md:max-w-full">
                  <div class="flex flex-col justify-center px-1.5 bg-stone-200 max-md:max-w-full">
                    <div class="flex overflow-hidden relative flex-col gap-5 justify-between items-end pt-20 pl-1.5 w-full min-h-[400px] max-md:flex-wrap max-md:max-w-full">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/630abb80828d5798731a5270fb847f5894bc12a7731b2c1af261cb00ee40d8c3?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="object-cover absolute inset-0 size-full" alt="Map of Milkomii Consultancy location" />
                      <div class="flex relative justify-center items-center p-0.5 mt-64 bg-white rounded border-2 border-white border-solid shadow-sm h-[42px] w-[42px] max-md:mt-10">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/520f6d692eddbfec21a5223172d53d3b1687ad6d93771927a7900d19a8ffc81c?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="aspect-square w-[38px]" alt="Location pin" />
                      </div>
                      <div class="flex relative gap-0 mt-52 text-xs leading-4 text-black max-md:mt-10">
                        <div class="flex flex-col self-end mt-16 max-md:mt-10">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/61122340ecf4a2af62b2c67d6f8ae9fb1f6651185fffa3ec36439bf69f1a83b1?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="self-center aspect-[2.38] w-[52px]" alt="Google Maps logo" />
                          <div class="flex gap-0">
                            <a href="#" class="px-1.5 bg-neutral-100">Keyboard shortcuts</a>
                            <a href="#" class="px-1.5 bg-neutral-100">Map data ©2024 Google</a>
                          </div>
                        </div>
                        <div class="flex flex-col text-right">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/74c2806955d1479b7f4bf8fc67ae130d94e7f3ea706ed263477e9b76ada257d3?apiKey=483b34a8932a491ba236aa99d50ad29a&" class="self-end aspect-[0.53] w-[46px]" alt="Map controls" />
                          <div class="flex gap-0 mt-1.5">
                            <a href="#" class="px-1.5 bg-neutral-100">Terms</a>
                            <a href="#" class="px-1.5 bg-neutral-100">Report a map error</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shrink-0 mt-9 max-w-full h-0.5 border-t border-white border-solid bg-neutral-800 w-[1078px]"></div>
        <p class="mt-4 text-xl leading-7 text-white max-md:max-w-full">
          © Copyright 2024 Milkomii Consultancy - All Rights Reserved
        </p>
      </footer> -->
      <footer class="footer bg-emerald-900">
        <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
          <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
        </svg>
        <div class="footer-content">

          <div class="flex justify-center pb-7 md:pb-0">
            <div class="flex md:flex-row flex-col w-5/6 py-4 md:gap-12 gap-5">
              <div class="md:w-2/5">
             
                  <!-- <p id="alt-text">Your browser does not support iframes or there was an error loading the content.</p>
                   <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2624.764066114199!2d38.79762343660764!3d8.862865084129705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2set!4v1688628685085!5m2!1sen!2set" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" onerror="showAltText()"></iframe> -->
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.64121134244!2d38.694204199999994!3d9.0051232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b878a9bf299c9%3A0x9a1f51e74e262f37!2sFAMILY%20TOWER!5e0!3m2!1sen!2set!4v1689333869222!5m2!1sen!2set" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
              </div>
              <div class="flex flex-col md:w-2/5 pt-3 text-center">
                 <h2 class="font-bold text-1xl">Address</h2>
                 <ul class="text-sm"> 
                  <li class="flex justify-center items-center flex-col"> <ul> <li class="flex justify-center items-center"> Addis Ababa City </li> <li class="flex justify-center items-center"> Meskel flower Rahmet Tower 4th floor #402 </li> </ul> </li>
                 <li class="flex justify-center items-center flex-row"> 
                  <span class="pr-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                    </span>
                    <span>
                      +251115589794
                    </span>
                  </li>
                  <li class="flex justify-center items-center flex-row"> 
                    <span class="pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                      </span>
                      <span>
                        +251116671376
                      </span>
                    </li>
                    <li class="flex justify-center items-center flex-row"> 
                      <span class="pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                          </svg>
                        </span>
                        <span>
                          +251116671693
                        </span>
                      </li>
                  <li class="flex justify-center items-center flex-row">
                     <span class="pr-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                    </span>
                    <span>
                      +251942129611
                    </span>
                  </li>
                  <li class="flex justify-center items-center flex-row">
                    <span class="pr-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                      </svg>
                    </span>
                    <span>
                      <a href="#">info@Milkomiiconsultancy.com</a>
                    </span>
                  </li>
                  <li class="flex justify-center items-center flex-row">
                    <span class="pr-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                      </svg>
                    </span>
                    <span>
                      <a href="#">https://www.Milkomiiconsultancy.com</a>
                    </span>
                  </li>
           
              
    

                </ul>
              </div>
              <div class="flex pt-3 pb-5 items-center flex-col md:w-1/5">
              <!--   <h6>LET'S CHAT</h6>
               <a id="showpopup" href="#hided"><button class="animated-button">
                <span>Get In Touch</span>
                <span></span>
              </button></a> -->
              <div class="flex flex-col gap-1">
                <h2 class="font-bold text-1xl english-content">Links</h2>
            
                <a href="#home" class="cursor-pointer hover:text-green-500 transition-colors duration-300 english-content text-sm">Home</a>
                <a href="#about" class="cursor-pointer hover:text-green-500 transition-colors duration-300 english-content text-sm">About</a>
                <a href="#what" class="cursor-pointer hover:text-green-500 transition-colors duration-300 english-content text-sm">Expertise</a>
  
              </div>
              <div class="flex justify-around w-5/6 mt-5">
                <div>
                  <a class="" href="">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 236 54">
                      <path class="footer-social-amoeba-path" d="M223.06,43.32c-.77-7.2,1.87-28.47-20-32.53C187.78,8,180.41,18,178.32,20.7s-5.63,10.1-4.07,16.7-.13,15.23-4.06,15.91-8.75-2.9-6.89-7S167.41,36,167.15,33a18.93,18.93,0,0,0-2.64-8.53c-3.44-5.5-8-11.19-19.12-11.19a21.64,21.64,0,0,0-18.31,9.18c-2.08,2.7-5.66,9.6-4.07,16.69s.64,14.32-6.11,13.9S108.35,46.5,112,36.54s-1.89-21.24-4-23.94S96.34,0,85.23,0,57.46,8.84,56.49,24.56s6.92,20.79,7,24.59c.07,2.75-6.43,4.16-12.92,2.38s-4-10.75-3.46-12.38c1.85-6.6-2-14-4.08-16.69a21.62,21.62,0,0,0-18.3-9.18C13.62,13.28,9.06,19,5.62,24.47A18.81,18.81,0,0,0,3,33a21.85,21.85,0,0,0,1.58,9.08,16.58,16.58,0,0,1,1.06,5A6.75,6.75,0,0,1,0,54H236C235.47,54,223.83,50.52,223.06,43.32Z"></path>
                    </svg>
                  </a>
                </div>
                <div>
                  <a class="" href="https://www.instagram.com/milkomi_education_consultancy?igsh=aW1jenl5YW1uN2dp" target="_blank">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                  </a>
                </div>
                <div>
                  <a class="" href="#" target="_blank">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-tiktok" viewBox="0 0 16 16">
                      <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                    </svg>
                  </a>
                </div>
                <div>
                  <a class="" href="#" target="_blank">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg> 
                  </a>
                </div>
                <div>
                  <a class="" href="https://t.me/milkomieducationconsultancy" target="_blank">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 496 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/></svg>
                  </a>
                </div>  
              </div>          

              </div>
            </div>
          </div>


          
          <!-- <div class="footer-social-links hidden">
             <svg class="footer-social-amoeba-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 236 54">
              <path class="footer-social-amoeba-path" d="M223.06,43.32c-.77-7.2,1.87-28.47-20-32.53C187.78,8,180.41,18,178.32,20.7s-5.63,10.1-4.07,16.7-.13,15.23-4.06,15.91-8.75-2.9-6.89-7S167.41,36,167.15,33a18.93,18.93,0,0,0-2.64-8.53c-3.44-5.5-8-11.19-19.12-11.19a21.64,21.64,0,0,0-18.31,9.18c-2.08,2.7-5.66,9.6-4.07,16.69s.64,14.32-6.11,13.9S108.35,46.5,112,36.54s-1.89-21.24-4-23.94S96.34,0,85.23,0,57.46,8.84,56.49,24.56s6.92,20.79,7,24.59c.07,2.75-6.43,4.16-12.92,2.38s-4-10.75-3.46-12.38c1.85-6.6-2-14-4.08-16.69a21.62,21.62,0,0,0-18.3-9.18C13.62,13.28,9.06,19,5.62,24.47A18.81,18.81,0,0,0,3,33a21.85,21.85,0,0,0,1.58,9.08,16.58,16.58,0,0,1,1.06,5A6.75,6.75,0,0,1,0,54H236C235.47,54,223.83,50.52,223.06,43.32Z"></path>
            </svg>
            <a class="footer-social-link instagram" href="#">
              <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg>
            </a>
            <a class="footer-social-link twitter" href="#">
              <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-tiktok" viewBox="0 0 16 16">
                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
              </svg></a>

              <a class="footer-social-link tictok" href="#">
                <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>  </a>
              <a class="footer-social-link facebook" href="#">
                <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 496 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/></svg>
                <!-- </a>
          </div> -->
        </div>
        <div class="footer-copyright bg-emerald-600 py-2">
          <div class="footer-copyright-wrapper">
            <p class="footer-copyright-text">
              <a class="footer-copyright-link" target="_blank" href="https://t.me/imran_hm" target="_self"> ©2024. | <a target="_blank" class="cursor-pointer hover:text-cyan-500 transition-colors duration-300">Designed By: MINA TECH.</a> | All rights reserved. </a>
            </p>
          </div>
        </div>
      </footer>
      <script>
        function toggleNavigation() {
          const nav1 = document.getElementById('menu');
          nav1.classList.toggle('hidden');
          const nav2 = document.getElementById('menu2');
          nav2.classList.toggle('hidden');
        }
      </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
    
          <!-- Your custom JavaScript file -->
          <script src="script.js"></script>

          <script>
            const checkbox = document.getElementById('cb2-7');
          
           
          
          
            
              const form = document.getElementById('contact-form');
          
                   const nameInput = document.getElementById('name');
                  const emailInput = document.getElementById('email');
                
                  const messageInput = document.getElementById('message');
          
            const errorName = document.getElementById('error-name');
            const errorEmail = document.getElementById('error-email');
          
            const errorMessage = document.getElementById('error-message');
          
            
          
          
          
          
          
            function validateName() {
              let nameValue = nameInput.value.trim();
          
              if (nameValue === '') {
                errorName.textContent = 'Please enter your name.';
                return false;
              }
          
              let nameRegex = /^[a-zA-Z\s]+$/;
              if (!nameRegex.test(nameValue)) {
                errorName.textContent = 'Name can only contain alphabets and spaces.';
                return false;
              }
          
              errorName.textContent = '';
              return true;
            }
          
            function validateEmail() {
              const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailRegex.test(emailInput.value.trim())) {
                errorEmail.textContent = 'Please enter a valid email address.';
                return false;
              } else {
                errorEmail.textContent = '';
                return true;
              }
            }
          
            
          
            function validateMessage() {
              let messageValue = messageInput.value.trim();
          
              if (messageValue === '') {
                errorMessage.textContent = 'Please enter a message.';
                return false;
              }
          
              let messageRegex = /^[a-zA-Z0-9\s]+$/;
              if (!messageRegex.test(messageValue)) {
                errorMessage.textContent = 'Message can only contain alphabets, numbers, and spaces.';
                return false;
              }
          
              errorMessage.textContent = '';
              return true;
            }
          
            async function handleSubmit(event) {
              event.preventDefault();
          
              const isNameValid = validateName();
              const isEmailValid = validateEmail();
           
              const isMessageValid = validateMessage();
          
              if (isNameValid && isEmailValid  && isMessageValid) {
                try {
                  const formData = {
                    name: nameInput.value,
                    email: emailInput.value,
                   
                    message: messageInput.value
                  };
          
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      var response = this.responseText;
                      console.log(response);
                    }
                  };
          
                  xhttp.open("POST", "index.php", true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          
                  var params = Object.keys(formData).map(function(key) {
                    return encodeURIComponent(key) + "=" + encodeURIComponent(formData[key]);
                  }).join("&");
          
                  alert("message sent successfully")
          
                  xhttp.send(params);
                } catch (error) {
                  console.error('Error sending email:', error);
                }
              }
            }
            nameInput.addEventListener('change', validateName);
          nameInput.addEventListener('blur', validateName);
          
          emailInput.addEventListener('change', validateEmail);
          emailInput.addEventListener('blur', validateEmail);
          
          
          
          messageInput.addEventListener('change', validateMessage);
          messageInput.addEventListener('blur', validateMessage);
          
            form.addEventListener('submit', handleSubmit);
          </script>
</body>
</html>