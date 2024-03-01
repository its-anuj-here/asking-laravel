<?php
    //file to prevent user to open signup when he's already logged in.
    include_once "./checkLoginTrue.php"
?>

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
        $cpassword = $_POST['cpassword'];
        $uniq = "SELECT * FROM `users` WHERE username = '$username'";
        $result = mysqli_query($conn , $uniq);
        if(mysqli_num_rows($result) > 0){
            $errorChk = 1;
        }
        else if($password != $cpassword){
            $errorChk = 2;
        }
        else if(strlen($password) == 0 || strlen($cpassword) == 0){
            $errorChk = 3;
        }
        else{
            $sequre = password_hash($password , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$sequre')";
            $result = mysqli_query($conn , $sql);
            if(!$result){
                echo mysqli_error($conn);
                echo "<script>
                    alert('Under Maintenance, try again later, Sorry for the inconvenience.');
                    window.location.href='./index.php';
                  </script>";
            }
            else{
                echo "<script>
                    alert('Signup Successful, Login to continue');
                    window.location.href='./login.php';
                  </script>";
            }
        }
    }
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
    <title>Sign Up</title>
  </head>
  <body>
    <?php include './navbar.php'?>
    

    <section class="text-gray-400 bg-gray-900 body-font pt-10">
      <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
          <h1 class="title-font font-medium text-6xl text-white">
            Hi Visitor !
          </h1>
          <p class="leading-relaxed mt-4 text-3xl">
          Be the first to know about latest tech and news at Ask Me Anything! Go join our forum... 
          </p>
        </div>
        <div
          class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0"
        >
          <h2 class="text-white text-lg font-medium title-font mb-5">
            Sign Up
          </h2><form action="./signup.php" method="post">
          <div class="relative mb-4">
            <label for="username" class="leading-7 text-sm text-gray-400"
              >User Name</label
            >
            <input
              type="text"
              id="username"
              name="username"
              class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-400"
              >Password</label
            >
            <input
              type="password"
              id="password"
              name="password"
              class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <div class="relative mb-4">
            <label for="cpassword" class="leading-7 text-sm text-gray-400"
              >Confirm Password</label
            >
            <input
              type="password"
              id="cpassword"
              name="cpassword"
              class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <button
            type="submit"
            class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg"
          >
            Join
          </button></form>
          <div class="flex gap-5 py-5 text-white/50 text-sm">
            <p>Already Have An Account?</p>
            <a class="underline underline-offset-8" href="./login.php">
              Login
            </a>
          </div>
        </div>
      </div>
    </section>

    <?php include_once './components/footer.php';?>
  </body>
</html>
