<header class="text-gray-400 body-font fixed top-0 bg-gray-900 z-10 flex justify-between w-full p-5">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">AsKing</span>
    </a>
    <nav class="flex flex-wrap items-center text-base justify-center">
      <a href="{{route('home')}}" class="mr-5 hover:text-white hover:text-lg">Home</a>
      <a href="{{route('category.all')}}" class="mr-5 hover:text-white hover:text-lg">Categories</a>
      <a href="{{route('home')}}/#features" class="mr-5 hover:text-white hover:text-lg">Features</a>
      <a href="{{route('team')}}" class="mr-5 hover:text-white hover:text-lg">Team</a>
    </nav>
    <div class="flex gap-2">
    <button id="user-btn"
        class="py-1 px-3 focus:outline-none hover:text-black rounded text-base text-white text-semibold bg-green-700 hover:text-white hover:bg-transparent border border-green-600 hover:border hover:border-yellow-600"
    >
    {{$user->username}}<i class="fa-regular fa-face-smile text-white pl-1"></i>
    </button>
    <button id="logout-btn"
      class="py-1 px-3 focus:outline-none hover:bg-red-700 rounded text-base text-white text-semibold bg-yellow-600 border border-yellow-600 hover:border hover:border-red-700" 
    >
      <a href="{{route('logout')}}" class="inline-flex items-center">
        Logout <i class="fa-solid fa-arrow-right-from-bracket"></i>
      </a>
    </button>
              
  <a id="login-btn" href="{{route('login')}}"
    class="inline-flex items-center gap-2 rounded border border-green-600 hover:border hover:border-yellow-600 bg-green-700 px-6 py-3 text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-yellow-500"
  >
    <span class="text-sm font-medium"> Login </span>

    <svg xmlns="http://www.w3.org/2000/svg" 
      class="size-5"
      fill="currentColor"
      viewBox="0 0 512 512">
      <path d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z"/>
    </svg>
          
  </a>
</div>
</header>