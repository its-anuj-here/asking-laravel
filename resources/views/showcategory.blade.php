@extends('layout')
@section('title', $category->cat_name)
@section('content')
    <main>
      <!-- banner -->
      
      <section
        class="w-full p-10 flex justify-between pt-[12rem] bg-gray-900 banner_dis">
        <article class="flex flex-col gap-7">
          <h2 class="text-4xl text-white font-bold">{{$category->cat_name}}</h2>
          <p class="text-white/70 w-[55%]">
          {{substr($category->cat_desc , 0 , 300)}}
          </p>
          <button
            class="self-start justify-self-start px-4 py-2 border border-2 border-white text-white"
          >
            <a href="#question" class="cursor-pointer">"{View Questions}"</a>
          </button>
        </article> 
        <div class="flex gap-4">
          <a
          class="text-white w-fit h-fit bg-yellow-500 border-0 py-1 px-7 focus:outline-none hover:bg-yellow-600 rounded text-lg cursor-pointer"
          href="{{route('category.edit', ['category'=>$category])}}">
            Edit
          </a>
          <form action="{{route('category.delete', ['category'=>$category])}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-white w-fit h-fit  bg-yellow-500 border-0 py-1 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">
              Delete
            </button>
          </form>
        </div>
      </section>

      <!-- ask question filed -->

      <section class="bg-gray-900 p-10 flex flex-col gap-10">
        <h2
          class="text-4xl text-white font-bold border border-2 border-green-400 w-fit px-4 py-2"
        >
        ?> "Ask From Community"
        </h2>
        <form method="post" action="{{route('question.create', ['category'=> $category])}}" class="flex flex-col bg-gray-800 rounded-lg p-6 gap-[2rem]">
          @csrf
          @method('post')
          <input type="text" name="title" placeholder="Title"
            class="bg-transparent placeholder:text-white placeholder:capitalize text-white focus:outline focus:outline-1 focus:outline-yellow-500 px-2 py-3 rounded-lg"
          />
          <textarea name="description" cols="28" rows="2" placeholder="Description"
                      class="bg-transparent placeholder:text-white placeholder:capitalize text-white focus:outline focus:outline-1 focus:outline-yellow-500 px-2 py-3 rounded-lg"
          ></textarea>
          <button type="submit" class="w-fit bg-yellow-500 text-black px-6 py-2 self-center justify-self-center rounded-sm"
          >
            Post
          </button>
        </form>
        <p class="width-full text-center text-3xl text-yellow-500">
          <a class="text-green-500" href="{{route('login')}}">Login</a> to post the query.
        </p>
        
      </section>

      <!-- all question -->
      
      <section class="bg-gray-900 p-10 flex flex-col gap-10" id="question">
        <h2
          class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
        >
          ?> "{All Questions}"
        </h2>
       
          @if($questions->isEmpty())
            <div class="flex flex-col">
              <p class="width-full text-4xl text-red-500">
                <strong class="text-yellow-400">OOPS!!</strong> No questions yet on this category
                <br><p class="text-3xl text-green-700">
                  Be the first one to post...
                </p>
              </p>
            </div>
          @else
          <div class="flex gap-10">';
              <article class="flex flex-col gap-3 question">
                <h3 class="text-2xl text-yellow-500 font-semibold flex flex-col gap-2 justify-between">
                  <a href="./query.php?queryid='.$id.'" class="cursor-pointer">Query : $que_name</a>
                  <span class="text-sm text-white">By user <strong class="text-green-500">'.$username.'</strong> on '.$posted.'</span>
                </h3>
                <p class="text-md text-white/50 w-4/5">
                  substr $que_desc , 0 , 150
                </p>
                <div class="text-center mt-2 leading-none flex w-full">
                  <span class="text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-700 border-opacity-50">
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
                      <circle cx="12" cy="12" r="3"></circle>
                    </svg>$views
                  </span>
                  <span class="text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-700 border-opacity-50">
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
                    </svg>$numOfComments
                  </span>
                  <span class="text-gray-500 inline-flex items-center leading-none text-sm">
                    <abbr title="Vote if you want to ask similar question">Vote</abbr> &nbsp;
                    <div class="flex px-3 gap-1 item-center justify-between h-fit w-fit">
                      <button onclick="voteChange('.$id.','.($voteCount+1).',0)"><i class="text-green-400 fa-solid fa-circle-arrow-up"></i></button>
                      <p class="text-white text-center p-1" id="voteCount">'0</p>
                      <button onclick="voteChange('.$id.','.($voteCount-1).',0)"><i class="text-red-500 fa-solid fa-circle-arrow-down"></i></button>
                    </div>
                    
                    
                  </span>
                  
                </div>
              </article>
              <a href="./query.php?queryid='.$id.'" class="cursor-pointer"></a>
          </div>
          @endif
              
      </section>

      <!-- view more categories -->

      @include('topcat')
    </main>
    
@endsection