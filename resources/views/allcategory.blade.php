@extends('layout')
@section('title','All Categories')

@section('content')
    <section
    class="w-full p-10 pb-2 flex justify-between pt-[8rem] bg-gray-900"
    >
        <article class="flex flex-col gap-7">
            <h2 class="text-4xl text-white font-bold">Available Categories !!</h2>
        </article>
        <div id="search-div" class="flex justify-center bg-gray-700 rounded-lg px-2 py-1">
            <div class="flex items-center gap-5">
              <box-icon class="text-white" name="search-alt"></box-icon>
              <input id="search-text" type="text" class="bg-transparent  text-white focus:outline-none" placeholder="Search Category" />
            </div>
        </div>
        <a
          class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg cursor-pointer"
          href="{{route('category.add')}}"
        >
          Add New
    </a>
    </section>
    
    <!-- category section -->
    <section
            class="text-gray-400 bg-gray-900 body-font flex relative w-full flex-wrap justify-center pt-20 pb-20"
            id="cat-container"
    >
       @foreach ($categories as $category)
            <div class="p-4 lg:w-1/3 relative overflow-hidden card">
                <div class="mycard h-full bg-gray-800 bg-opacity-40 px-8 pt-16 pb-20 rounded-lg overflow-hidden text-center relative">
                <h1
                    class="title-font sm:text-2xl text-xl font-medium text-white mb-3"
                >
                {{$category->cat_name}}
                </h1>
                <p class="leading-relaxed mb-3">
                    {{substr($category->cat_desc, 0, 100)}}
                </p>
                
                <a
                    class="text-yellow-400 inline-flex items-center cursor-pointer"
                    href="{{route('category.show', ['category'=> $category])}}"
                >Join Discussion
                    <svg
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    >
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
                <div
                    class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"
                >
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
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        {{$category->cat_views}}
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
                            ></path>
                        </svg>{{$category->questions}}
                    </span>
                    </div>
                </div>
            </div>
        @endforeach 
    </section>
@endsection