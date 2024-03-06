@extends('layout')
@section('title', 'Developer Team')
@section('content')
<section id="team" class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col gap-10 text-center w-full mb-20">
        <h1 class="text-2xl font-medium title-font mb-4 text-white">
          OUR TEAM
        </h1>
        <div class="h-full flex flex-col items-center text-center">
            <img
              alt="team"
              class="flex-shrink-0 rounded-lg w-auto h-56 object-cover object-center mb-4"
              src="{{ asset('storage/user2.png') }}"
            />
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-white">
                Anuj
              </h2>
              <h3 class="text-gray-500 mb-3">Fullstack Developer</h3>

              <span class="inline-flex">
                <a class="text-gray-600" href="https://www.instagram.com/its_anuj_ig/">
                    <svg
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      class="w-5 h-5"
                      viewBox="0 0 24 24"
                    >
                      <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                      <path
                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                      ></path>
                    </svg>
                  </a>
                <a class="ml-3 text-gray-700" href="mailto:group.it100project@gmail.com">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="3"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                    ></path>
                  </svg>
                </a>
                <a class="ml-3 text-gray-600" href="https://www.linkedin.com/in/anuj-kumar-5b6978166">
                    <svg
                      fill="currentColor"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="0"
                      class="w-5 h-5"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke="none"
                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
                      ></path>
                      <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                  </a>
              </span>
            </div>
            <h2 class="pt-5">Happy to help!</h2> 
          </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
          This Website is built by us on setting a goal of creating platform for all tech lover to share there thoughts and get to know other people across the globe.
        </p>
      </div>
      
    </div>
  </section>
@endsection