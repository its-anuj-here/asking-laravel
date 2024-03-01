<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once './fav.php';?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="./script.js"></script>
    <title>Category</title>
  </head>
  <body>
    <?php include './navbar.php'?>
    <?php
      //adding new received query
      include_once './components/dbconnect.php';
      $id = $_GET['id'];
      if(!$conn){
        echo "<script>
        window.location.href='./sitedown.php';
        </script>";
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $addtitle = $_POST['title'];
          $addtitle = str_replace(">" , "&gt;" , $addtitle);
          $addtitle = str_replace("<" , "&lt;" , $addtitle);
          $adddesc = $_POST['desc'];
          $adddesc = str_replace(">" , "&gt;" , $adddesc);
          $adddesc = str_replace("<" , "&lt;" , $adddesc);
          $username = $_SESSION['username'];
          $user_id = $_SESSION['user_id'];
          $sql = "INSERT INTO `queries` (`query_title`, `query_desc`, `query_cat`, `user_id`, `tstamp`) VALUES ('$addtitle', '$adddesc', '$id', '$user_id', current_timestamp())";
          $result = mysqli_query($conn , $sql);
          if(!$result){
            echo"<script>alert('OOPS!! Some error occurred <br>Sorry for the inconvenience.');</script>";
          }
          else{
              echo"<script>alert('Your query has been added successfully.....');</script>";
          }
      }
    ?>
    <main>
      <!-- banner -->
      <?php
          //For Category name and description
          $sql = "UPDATE `category` set `cat_views` = `cat_views`+1 where `cat_id`=".$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo "<script>alert('Oops! Your view is not recorded.');</script>";
          }
          $sql = 'SELECT * FROM `category` WHERE cat_id = '.$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo "<div class='alert alert-danger alert-dismissible fade show ' style = 'width:50vw;
                  margin:10px auto;' role='alert'>
                      <strong>OOPS!!</strong> Some error occured <br>Please try again later.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
          }
          $row = mysqli_fetch_assoc($result);
      ?>
      <section
        class="w-full p-10 flex justify-start pt-[12rem] bg-gray-900 banner_dis"
      >
        <article class="flex flex-col gap-7">
          <h2 class="text-4xl text-white font-bold"><?php echo $row['cat_name']?></h2>
          <p class="text-white/70 w-[55%]">
          <?php echo substr($row['cat_desc'] , 0 , 300).'..';?>
          </p>
          <button
            class="self-start justify-self-start px-4 py-2 border border-2 border-white text-white"
          >
            <a href="#question" class="cursor-pointer">"{View Questions}"</a>
          </button>
        </article>
      </section>

      <!-- ask question filed -->

      <section class="bg-gray-900 p-10 flex flex-col gap-10">
        <h2 class="text-4xl font-bold text-white">"?{Ask From Community}"</h2>
        <?php
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<form method="post" action="'.$_SERVER['REQUEST_URI'].'" class="flex flex-col bg-gray-800 rounded-lg p-6 gap-[2rem]">
                    <input
                      type="text"
                      name="title"
                      placeholder="Title"
                      class="bg-transparent placeholder:text-white placeholder:capitalize text-white focus:outline focus:outline-1 focus:outline-yellow-500 px-2 py-3 rounded-lg"
                    />
                    <textarea
                      name="desc"
                      cols="28"
                      rows="2"
                      placeholder="Description"
                      class="bg-transparent placeholder:text-white placeholder:capitalize text-white focus:outline focus:outline-1 focus:outline-yellow-500 px-2 py-3 rounded-lg"
                    ></textarea>
                    <button
                      type="submit"
                      class="w-fit bg-yellow-500 text-black px-6 py-2 self-center justify-self-center rounded-sm"
                    >
                      Submit
                    </button>
                  </form>';
          }
          else{
            echo '<p class="width-full text-center text-3xl text-yellow-500">
                    <a class="text-green-500" href="./login.php">Login</a> to post the first query.
                  </p>';
          }
        ?>
        
      </section>

      <!-- all question -->
      
      <section class="bg-gray-900 p-10 flex flex-col gap-20" id="question">
        <h2
          class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
        >
          "{All Questions}"
        </h2>
        <?php 
          $sql = 'SELECT * FROM `queries` WHERE query_cat = '.$id;
          $result = mysqli_query($conn , $sql);
          if(!$result){
              echo '<div class="flex gap-10">
                      <p class="width-full text-center text-4xl text-red-500">
                        <strong>OOPS!!</strong> Some error occured <br>Please try again later.
                      </p>
                    </div>';
          }
          else{
              $row = mysqli_num_rows($result);
              if($row < 1){
                  //IF THERE ARE NO QUERIES
                  echo '<div class="">
                          <p class="width-full text-center text-4xl text-white/70">
                            Oops! No queries yet on this category
                          </p>';
                      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        echo '<br><p class="width-full text-center text-3xl text-green-700">
                                Be the first one to post...
                              </p>';
                      }
                  echo '</div>';
              }
              else{
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['query_title'];
                    $desc = $row['query_desc'];
                    $id = $row['query_id'];
                    $views = $row['query_views'];
                    $voteCount = $row['votes'];
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

      <!-- view more categories -->

      <section class="flex flex-col gap-10 bg-gray-900 p-10">
        <h2
          class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
        >
          View More Categories
        </h2>

        <section
            class="text-gray-400 bg-gray-900 body-font flex relative w-full flex-wrap justify-center pt-10"
            id="cat-container"
        >
            <!-- cards -->
            <?php include './getCategories.php' ?>
        </section>
      </section>
    </main>

    <?php include_once './components/footer.php';?>
  </body>
</html>
