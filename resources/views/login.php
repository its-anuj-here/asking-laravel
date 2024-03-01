<?php
    //file to prevent user to open signup when he's already logged in.
    include_once "./checkLoginTrue.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once './fav.php';?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="./script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(document).ready(function(){
        var login_btn = document.getElementById("login-a");
        login_btn.innerText('SignUp');

        login_btn.onclick = function() {
          window.location.href = './signup.php';
        }
      });
    </script>
    <title>Login</title>
    
  </head>
  <body>
    <?php include "./navbar.php"?>
    <?php
    require_once './components/dbconnect.php'; //have conn variable
    $errorChk = 0;

    if(!$conn){
      echo "<script>
      window.location.href='./sitedown.php';
      </script>";
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $uniq = "SELECT * FROM `users` WHERE username = '$username' ";
        $result = mysqli_query($conn , $uniq);
        if(mysqli_num_rows($result) != 1){
            echo "<script>alert(' OOPS! Either wrong username or password');
                </script>";
        }
        else{
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password , $row['password'])){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['usid'];
                header("location: ./index.php");
            }
            else{
              echo "<script>alert(' OOPS! Either wrong username or password');
              </script>";
            }
        }
    }
?>

    <section class="text-gray-400 bg-gray-900 body-font pt-10">
      <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
          <h1 class="title-font font-medium text-6xl text-white">
            Hey! Welcome Back
          </h1>
          <p class="leading-relaxed mt-4 text-3xl">
            We're elated to have you onboard of our community.
            Login to checkout new questions and current hot topics .....
          </p>
          
        </div>
        <div
          class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0"
        >
          <h2 class="text-white text-lg font-medium title-font mb-5">Login</h2>
          <form action="./login.php" method="post">
          <div class="relative mb-4">
            <label for="full-name" class="leading-7 text-sm text-gray-400"
              >Email</label
            >
            <input
              type="text"
              id="username"
              name="username"
              class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-400"
              >Password</label
            >
            <input
              type="password"
              id="password"
              name="password"
              class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <button
            type="submit"
            class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg"
          >
            Login
          </button>
        </form>
          <div class="flex gap-5 py-5 text-white/50 text-sm">
            <p>Don't Have An Account?</p>
            <a class="underline underline-offset-8" href="./signup.php">
              SignUp
            </a>
          </div>
        </div>
      </div>
    </section>

    <?php include_once './components/footer.php';?>
    
  </body>
</html>
