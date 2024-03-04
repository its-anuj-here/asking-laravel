<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once 'fav.php';?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script.js"></script>
    <title>Home</title>
  </head>
  <body>
    <?php require "navbar.php"?>
    <main>
      <!-- banner section -->
      <section
        class="w-full p-10 flex justify-start pt-[12rem] bg-gray-900 banner"
      >
        <article class="flex flex-col gap-7">
          <h2 class="text-4xl text-white font-bold">Explore Categories !!</h2>
          <div class="w-[20%] h-2 rounded-full bg-yellow-500 inline-flex"></div>
          <p class="text-white/70 w-[60%]">
            Ask Me Anything provides you lots of Categories, on which you can have a discussion with other users in Live Time.
            You can ask questions, and answers other users queries. You can also check views and comment on your query and answers.
          </p>
          <button
            class="self-start justify-self-start px-4 py-2 border border-2 border-white text-yellow-400"
            onclick="window.location.href='./onlyCategories.php';"
          >
            Explore Now
          </button>
        </article>
      </section>

      <!-- category section -->
      <section
        class="text-gray-400 bg-gray-900 body-font flex relative w-full flex-wrap justify-center pt-10"
        id="cat-container"
      >
        <!-- cards -->
        <?php include 'getCategories.php' ?>
      </section>

      <!-- features -->
      <section id="features" class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="text-center mb-20">
            <h1
              class="sm:text-3xl text-2xl font-medium title-font text-white mb-4"
            >
              Features
            </h1>

            <div class="flex mt-6 justify-center">
              <div
                class="w-16 h-1 rounded-full bg-yellow-500 inline-flex"
              ></div>
            </div>
          </div>
          <div
            class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6"
          >
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
              <div
                class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-gray-800 text-yellow-400 mb-5 flex-shrink-0"
              >
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-10 h-10"
                  viewBox="0 0 24 24"
                >
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-white text-lg title-font font-medium mb-3">
                  Interactive UI
                </h2>
                <p class="leading-relaxed text-base">
                  Our site's UI is very user friendly even for first time users.
                  We put a lot of effort in making it more appealing as well as smooth for devices with low specs.
                </p>
                <a class="mt-3 text-yellow-400 inline-flex items-center"
                  >Learn More
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
              <div
                class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-gray-800 text-yellow-400 mb-5 flex-shrink-0"
              >
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-10 h-10"
                  viewBox="0 0 24 24"
                >
                  <circle cx="6" cy="6" r="3"></circle>
                  <circle cx="6" cy="18" r="3"></circle>
                  <path
                    d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"
                  ></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-white text-lg title-font font-medium mb-3">
                  Variety Of Answers
                </h2>
                <p class="leading-relaxed text-base">
                Depending on which user you ask, though, there are a variety of answers as your needs.
                This questioning allows you to get from available users across website.
                </p>
                <a class="mt-3 text-yellow-400 inline-flex items-center"
                  >Learn More
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
              <div
                class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-gray-800 text-yellow-400 mb-5 flex-shrink-0"
              >
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-10 h-10"
                  viewBox="0 0 24 24"
                >
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-white text-lg title-font font-medium mb-3">
                  Vast Comunity
                </h2>
                <p class="leading-relaxed text-base">
                  We have a vast user base, which helps users to get there queries answered in short period of time.
                  Moreover, it provides information to all users about all the current going discussions.
                </p>
                <a class="mt-3 text-yellow-400 inline-flex items-center"
                  >Learn More
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- contact us -->
      <section class="text-gray-400 bg-gray-900 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
          <div
            class="lg:w-2/3 md:w-1/2 bg-gray-900 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative"
          >
            <iframe
              title="map"
              class="absolute inset-0"
              style="filter: grayscale(1) contrast(1.2) opacity(0.3)"
              marginheight="0"
              marginwidth="0"
              scrolling="no"
              src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=keshav mahavid&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
              width="100%"
              height="100%"
              frameborder="0"
            ></iframe>
            <div
              class="bg-gray-900 relative flex flex-wrap py-6 rounded shadow-md"
            >
              <div class="lg:w-1/2 px-6 mb-4">
                <h2
                  class="title-font font-semibold text-white tracking-widest text-xs"
                >
                  ADDRESS
                </h2>
                <p class="mt-1">
                  Delhi, India
                </p>
              </div>
              <div class="lg:w-2/3 px-6 mt-4 lg:mt-0">
                <h2
                  class="title-font font-semibold text-white tracking-widest text-xs"
                >
                  EMAIL
                </h2>
                <a class="lg:w-1/5 text-yellow-400 leading-relaxed">group.it100project@gmail.com</a>
                <h2
                  class="title-font font-semibold text-white tracking-widest text-xs mt-4"
                >
                  PHONE
                </h2>
                <p class="leading-relaxed">123-456-7890</p>
              </div>
            </div>
          </div>
          <div
            class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0"
          >
            <h2 class="text-white text-xl mb-1 font-medium title-font">
              Feedback
            </h2>
            <form method='post' action='./feedbacks.php'>
            <div class="relative mb-4">
              
              <label for="sender_name" class="leading-7 text-sm text-gray-400"
                >Name</label
              >
              <input
                type="text"
                id="sender_name"
                name="sender_name"
                class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              />
            </div>
            <div class="relative mb-4">
              <label for="sender_email" class="leading-7 text-sm text-gray-400"
                >Email</label
              >
              <input
                type="email"
                id="sender_email"
                name="sender_email"
                class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              />
            </div>
            <div class="relative mb-4">
              <label for="message" class="leading-7 text-sm text-gray-400"
                >Message</label
              >
              <textarea
                id="message"
                name="message"
                class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
              ></textarea>
            </div>
            <button
              class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg"
              type="submit"
            >
              Submit
            </button>
            </form>
            <p class="text-xs text-gray-400 text-opacity-90 mt-3 text-center">
              Thansk For Giving Your Precious Time
            </p>
          </div>
        </div>
      </section>
    </main>
    <?php include_once 'components/footer.php';?>
  </body>
</html>
