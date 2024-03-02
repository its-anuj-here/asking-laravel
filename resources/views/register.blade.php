@extends('layout')
@section('title', 'Registeration')
@section('content')
<section class="text-gray-400 bg-gray-900 body-font pt-10">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
        <h1 class="title-font font-medium text-6xl text-white">
          Hi Visitor !
        </h1>
        <p class="leading-relaxed mt-4 text-3xl">
        Be the first to know about latest tech and topics at <b>asKing!</b><br> Go join our community... 
        </p>
      </div>
      <div
        class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0"
      >
        <h2 class="text-white text-lg font-medium title-font mb-5">
          Registration
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
          Register
        </button></form>
        <div class="flex gap-5 py-5 text-white/50 text-sm">
          <p>Already Have An Account?</p>
          <a class="underline underline-offset-8" href="{{route('login')}}">
            Login
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection