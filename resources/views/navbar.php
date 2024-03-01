<body>
  <header class="text-gray-400 body-font fixed top-0 bg-gray-900 z-10 flex justify-between w-full p-5">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Ask Me Anything</span>
    </a>
    <nav class="flex flex-wrap items-center text-base justify-center">
      <a href="./index.php" class="mr-5 hover:text-white">Home</a>
      <a href="./index.php#cat-container" class="mr-5 hover:text-white">Categories</a>
      <a href="./index.php#features" class="mr-5 hover:text-white">Features</a>
      <a href="./team.php" class="mr-5 hover:text-white">Team</a>
    </nav>

    <div id="search-div" class="flex justify-center bg-gray-700 rounded-lg px-2 py-1">
      <div class="flex items-center gap-3">
        <box-icon class="text-white" name="search-alt"></box-icon>
        <input id="search-text" type="text" class="bg-transparent focus:outline-none" placeholder="Search Here" />
      </div>
    </div>
    <?php 
    if(session_status()!=2)
      session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo '
          <div class="flex gap-2">
          <button id="user-btn"
              class="border-0 py-1 px-3 focus:outline-none hover:bg-white hover:text-black rounded text-base text-white text-semibold bg-blue-400"
          >
          '.$_SESSION['username'].' <i class="fa-regular fa-face-smile text-black"></i>
          </button>
          <button id="logout-btn"
            class="border-0 py-1 px-3 focus:outline-none hover:bg-red-700 rounded text-base text-white text-semibold bg-yellow-500"
          >
            <a href="./_logout.php" class="inline-flex items-center">
              Logout <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
          </button></div>';
    } else {
      echo '
          <button id="login-btn"
            class="border-0 py-1 px-3 focus:outline-none hover:bg-green-700 rounded text-base text-white text-semibold mt-4 md:mt-0 bg-green-600"
          >
            <a href="./login.php" id="login-a" class="inline-flex items-center gap-3">
              Login
            <box-icon class="text-white" type="solid" name="user-plus"></box-icon>
            </a>
          </button>';
    }
    ?>
    <script>
      $(document).ready(function(){
        if (ifPageIs('index.php')||ifPageIs('onlyCategories.php')||ifPageIs('/')) {
          $('#search-div').show();
        }
        else {
          $('#search-div').hide();
        }
      });
  </script>


  </header>
</body>