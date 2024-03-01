<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script src="./script.js"></script>
    <?php include_once './fav.php';?>
    <title>Questions</title>
  </head>
  <body>
  <?php include_once './navbar.php';?>
    
    <main>
      <!-- ques -->
      
      <section
        class="w-full p-10 flex justify-start pt-[12rem] bg-gray-900 banner_ques"
      >
      <?php
        require_once './components/dbconnect.php'; //have conn variable
        if(!$conn){
            echo "<script>
            window.location.href='./sitedown.php';
            </script>";
        }
        else{
          $id = $_GET['queryid'];
          $sql = "UPDATE `queries` set `query_views` = `query_views`+1 where `query_id`=".$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo "<script>alert('Oops! Your view is not recorded.');</script>";
          }
          $sql = 'SELECT * FROM `queries` WHERE query_id = '.$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo "<div class='alert alert-danger alert-dismissible fade show ' style = 'width:50vw;
              margin:10px auto;' role='alert'>
                  <strong>OOPS!!</strong> Some error occured <br>Please try again later.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
          }
          else{
              while($row = mysqli_fetch_assoc($result)){
                  $title = $row['query_title'];
                  $desc = $row['query_desc'];
                  $time = $row['tstamp'];
                  // POST DATE AND TIME DETAILS
                  $hr = substr($time , 11,2);
                  $min = substr($time , 14,2);
                  $sec = substr($time , 17,2);
                  $date = substr($time , 8,2);
                  $month = substr($time , 5,2);
                  $year = substr($time , 0,4);
                  $posted = date("l jS M Y h:i A", mktime($hr, $min, $sec, $month, $date, $year));

                  //USER AREA
                  $userid = $row['user_id'];
                  $sql = 'SELECT * FROM `users` WHERE usid = '.$userid;
                  $result = mysqli_query($conn , $sql);
                  while($user = mysqli_fetch_assoc($result)){
                      $username = $user['username'];
                  }

                  //POST DETAILS
                  echo '
                    <article class="flex flex-col gap-7">
                      <h2 class="text-4xl text-yellow-600 font-bold">'. $title ;
                      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        if($_SESSION['username'] == $username) {
                          echo '<button onclick="deleteQuery('.$id.');" class="ml-10 px-2 py-2 text-sm border border-2 border-red-600 rounded-3xl text-white w-[14%]">"{ DELETE your Query }"</button>';
                        }
                      }
                      
                      echo '</h2><p class="text-white/70 w-[60%]">
                        '.$desc.'
                      </p>
                      <p
                        class="self-start justify-self-start px-4 py-2 border border-2 border-yellow-500 text-white"
                      >
                        Asked by <i class="fas fa-user"></i> { '.$username.' }
                      </p>
                      <p
                        class="self-start justify-self-start px-4 py-2 text-yellow-500"
                      >
                        Posted on '.$posted.'
                      </p>
                    </article>';
              }
              
          }
        }

      ?>
        
      </section>

      <!-- ask question filed -->
      <section class="bg-gray-900 p-10 flex flex-col gap-10">
        <h2 class="text-4xl font-bold text-white">"?{Add Comment}"</h2>
        <?php
        //Adding Comments section
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo'
            <form class="flex flex-col bg-gray-800 rounded-lg p-6 gap-[2rem]" method="post" action ="'.$_SERVER['REQUEST_URI'].'">
              <textarea
                name = "comment"
                cols="30"
                rows="2"
                placeholder="Description"
                class="bg-transparent placeholder:text-white placeholder:capitalize text-white focus:outline focus:outline-1 focus:outline-yellow-500 px-2 py-3 rounded-lg"
              ></textarea>
              <button
                type="submit"
                class="text-white self-center justify-self-center rounded-sm border border-2 border-yellow-400 w-fit px-6 py-2"
              >
                Submit
              </button>
            </form>';

          }
          else{
              echo '<h2 class="text-4xl text-center font-bold text-white">
                      <p class="width-full text-center text-3xl text-yellow-500">
                        <a class="text-green-500" href="./login.php">Login</a> to post comments !
                      </p>
                    </h2>';

          }
          //comment form handling
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment = $_POST['comment'];
            $user_id = $_SESSION['user_id'];
            $comment = str_replace(">" , "&gt;" , $comment);
            $comment = str_replace("<" , "&lt;" , $comment);
            $sql = "INSERT INTO `comments` ( `comment`, `userid`, `queryid`, `tstamp`) VALUES ('$comment', '$user_id', '$id', current_timestamp())";
            $result44 =mysqli_query($conn , $sql);
            if(!$result44){
              echo"<script>alert('OOPS!! Some error occurred <br>Sorry for the inconvenience.');</script>";
            }
            else{
                echo"<script>alert('YAY ! Comment added successfully..');</script>";
            }
          }
        ?>
        
      </section>

      <section class="bg-gray-900 p-10 flex flex-col gap-20" id="question">
        <h2 class="text-3xl text-white font-semibold">"{All Comments}"</h2>
        <?php
          $sql = 'SELECT * FROM `comments` WHERE queryid='.$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo "<div class='alert alert-danger alert-dismissible fade show ' style = 'width:50vw;
              margin:10px auto;' role='alert'>
              <strong>OOPS!!</strong> Some error occured <br>Please try again later.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
          //COMMENT SECTION
          else if(mysqli_num_rows($result)==0){
            echo '<div class="gap-3 mb-8 border-b-2 border-yellow-500">
                    <p class="width-full text-center text-2xl mb-5 text-white/70">
                      No comments yet on this category
                    </p>  
                  </div>';
          }
          else{
              echo '<div class = "px-5">';
              while($row = mysqli_fetch_assoc($result)){
                  $comVote =$row['votes'];
                  $comment = $row['comment'];
                  $comm_id = $row['commentid'];
                  $time = $row['tstamp'];

                  //USER DETAILS AREA
                  $userid = $row['userid'];
                  $sql2 = 'SELECT * FROM `users` WHERE usid = '.$userid;
                  $result2 = mysqli_query($conn , $sql2);
                  while($user = mysqli_fetch_assoc($result2)){
                      $username = $user['username'];
                  }


                  // POST DATE AND TIME DETAILS
                  $hr = substr($time , 11,2);
                  $min = substr($time , 14,2);
                  $sec = substr($time , 17,2);
                  $date = substr($time , 8,2);
                  $month = substr($time , 5,2);
                  $year = substr($time , 0,4);
                  // END OF DATE AND TIME DETAILS
                  $posted = date("l jS \of F Y", mktime($hr, $min, $sec, $month, $date, $year));
                  echo '
                    <div class="flex gap-3 mb-8 border-b-2 border-yellow-500">
                      <div class="flex flex-col justify-between w-fit mb-3">
                        <button onclick="voteChange('.$comm_id.','.($comVote+1).');"><i class="text-green-400 fa-solid fa-circle-arrow-up"></i></button>
                        <p class="text-white text-center" id="voteCount">'.$comVote.'</p>
                        <button onclick="voteChange('.$comm_id.','.($comVote-1).');"><i class="text-red-500 fa-solid fa-circle-arrow-down"></i></button>
                      </div>
                      <div class="flex self-end text-sm text-yellow-500 w-[20rem] mb-3">
                      <i class="fas fa-user"></i> { '.$username.' } <small><b> '.$posted.'</b></small>
                      </div><br>
                      <article class="flex flex-col gap-5 question">
                        <p class="text-md text-white/50">
                        '.$comment.'
                        </p>
                      </article>
                      
                    </div>';
              }
          }
        ?>
        
      </section>

      <!-- simialr questions -->
      <section class="bg-gray-900 p-10 flex flex-col gap-20">
        <h2
          class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
        >
          "{Other Questions in this Category}"
        </h2>
        <?php
          $sql2 = 'SELECT * FROM `queries` WHERE query_id = '.$_GET['queryid'];
          $result2 = mysqli_query($conn , $sql2);
          while($user = mysqli_fetch_assoc($result2)){
              $cat_id = $user['query_cat'];
          }
          $sql = "SELECT * FROM `queries` WHERE `query_id` != ".$_GET['queryid']." AND `query_cat` = '".$cat_id."'";
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo '<div class="flex gap-10">
                      <p class="width-full text-center text-4xl text-red-500">
                        <strong>OOPS!!</strong> Some error occurred <br>Please try again later.
                      </p>
                    </div>';
          }
          else{
              $row = mysqli_num_rows($result);
              if($row < 1){
                  //IF THERE ARE NO QUERIES
                  echo '<div class="">
                          <p class="width-full text-center text-4xl text-white/70">
                            Oops! No other queries yet on this category
                          </p>
                        </div>';
              }
              else{
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['query_title'];
                    $desc = $row['query_desc'];
                    $id = $row['query_id'];
                    $voteCount = $row['votes'];
                    $views = $row['query_views'];;
                    $catid = $row['query_cat'];
                    $time = $row['tstamp'];

                    //USER DETAILS AREA
                    $userid = $row['user_id'];
                    $sql2 = 'SELECT * FROM `users` WHERE usid = '.$userid;
                    $result2 = mysqli_query($conn , $sql2);
                    $user = mysqli_fetch_assoc($result2);
                    $username = $user['username'];

                    //POST TIME AND DETAILS
                    $hr = substr($time , 11,2);
                    $min = substr($time , 14,2);
                    $sec = substr($time , 17,2);
                    $date = substr($time , 8,2);
                    $month = substr($time , 5,2);
                    $year = substr($time , 0,4);
                    // END OF DATE AND TIME DETAILS
                    $posted = date("l jS M Y", mktime($hr, $min, $sec, $month, $date, $year));
                    
                    $sql = 'SELECT * FROM `comments` WHERE queryid='.$id;
                    $result3 = mysqli_query($conn , $sql);
                    if(!$result3){
                      $numOfComments=0;
                    }
                    else{
                      $numOfComments=mysqli_num_rows($result3);
                    }

                    echo '<div class="flex gap-10">';
                    echo '<div class="flex flex-col justify-between w-fit">
                              <button onclick="voteChange('.$id.','.($voteCount+1).',0)"><i class="text-green-400 fa-solid fa-circle-arrow-up"></i></button>
                              <p class="text-white text-center" id="voteCount">'.$voteCount.'</p>
                              <button onclick="voteChange('.$id.','.($voteCount-1).',0)"><i class="text-red-500 fa-solid fa-circle-arrow-down"></i></button>
                          </div>';

                    echo '
                          <a href="./query.php?queryid='.$id.'" class="cursor-pointer">
                            <article class="flex flex-col gap-3 question">
                              <h3
                                class="text-2xl text-yellow-500 font-semibold flex justify-between"
                              >
                                Query : '. $title .'
                                <span class="text-sm text-white">By user <strong class="text-green-500">'.$username.'</strong> on '.$posted.'</span>
                              </h3>
                              <p class="text-md text-white/50 w-4/5">
                              '. substr($desc , 0 , 150) .'..
                              </p>
                              <div class="text-center mt-2 leading-none flex w-full">
                                <span
                                  class="text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-700 border-opacity-50"
                                >
                                  <svg
                                    class="w-4 h-4 mr-1"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    viewBox="0 0 24 24"
                                  >
                                    <path
                                      d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                    ></path>
                                    <circle cx="12" cy="12" r="3"></circle></svg
                                  >'.$views.'
                                </span>
                                <span
                                  class="text-gray-500 inline-flex items-center leading-none text-sm"
                                >
                                  <svg
                                    class="w-4 h-4 mr-1"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    viewBox="0 0 24 24"
                                  >
                                    <path
                                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                                    ></path></svg
                                  >'.$numOfComments.'
                                </span>
                              </div>
                            </article>
                          </a></div>
                    ';
                }
              }
          }
        ?>
        
      </section>
    </main>

    <?php include_once './components/footer.php';?>
  </body>
</html>
