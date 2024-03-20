@extends('layout')
@section('title', $question->que_title)
@section('content')
    <main>
      <!-- banner -->
      
      <section
        class="w-full p-10 flex justify-between pt-[12rem] bg-gray-900 banner_ques">
        <article class="flex flex-col gap-7">
          <h2 class="text-4xl text-white font-bold">{{$question->que_title}}</h2>
          <p class="text-white/70 w-[55%]">
          {{substr($question->que_desc , 0 , 300)}}
          </p>
          <button
            class="self-start justify-self-start px-4 py-2 border border-2 border-white text-white"
          >
            <a href="#comments" class="cursor-pointer">"{View Comments}"</a>
          </button>
        </article> 
        <div class="flex gap-4">
          <a class="text-white w-fit h-fit bg-yellow-500 border-0 py-1 px-7 focus:outline-none hover:bg-yellow-600 rounded text-lg cursor-pointer"
          href="{{route('question.edit', ['question'=>$question])}}">
            Edit
          </a>
          <form action="{{route('question.delete', ['question'=>$question])}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-white w-fit h-fit  bg-yellow-500 border-0 py-1 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">
              Delete
            </button>
          </form>
        </div>
      </section>

      <!-- ask question filed -->

      <section class="bg-gray-900 p-10 flex flex-col gap-10" id="post_comment">
        <h2
          class="text-4xl text-white font-bold border border-2 border-green-400 w-fit px-4 py-2"
        >
        ?> "Ask From Community"
        </h2>
        <form method="post" action="{{route('comment.create', ['question'=> $question])}}" class="flex flex-col bg-gray-800 rounded-lg p-6 gap-[2rem]">
          @csrf
          @method('post')
          <textarea name="comment" cols="28" rows="2" placeholder="Your comment here"
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
      
      <section class="bg-gray-900 p-10 flex flex-col gap-10" id="comments">
        <h2
          class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
        >
          ?> "{All Comments}"
        </h2>
       
          @if($comments->isEmpty())
            <div class="flex flex-col rounded-lg bg-gray-800">
              <p class="width-full text-3xl py-3 text-white">
                <strong class="text-yellow-400  pl-5">OOPS!!</strong> No comments yet on this category question
                <br><a href="#post_comment" class="cursor-pointer text-2xl pl-5 pb-5 text-green-500">
                  Be the first one to post...
                </a>
              </p>
            </div>
          @else
            @foreach ($comments as $comment)
              <div class="flex gap-10 bg-gray-800 rounded-lg py-3 px-5">
                <article class="flex flex-col gap-3 question w-full">
                  <h3 class="text-2xl text-white font-semibold flex gap-2 justify-between">
                    <span class="">
                      {{ $comment->comment}}
                    </span>
                    <span class="text-sm text-white">By user
                        <strong class="text-green-600 pl-1">{{$comment->by_username}}</strong>
                    </span>
                  </h3>
                  <div class="text-center mt-2 leading-none flex justify-between w-full">
                    <div class="text-white/50"><span class="text-yellow-500">Posted on : </span>{{$comment->posted_at}}</div>
                    <div>
                      <span class="text-gray-500 inline-flex items-center leading-none text-sm">
                        <abbr title="Vote if you want to ask similar question">Vote</abbr> &nbsp;
                        <div class="flex px-3 gap-1 item-center justify-between h-fit w-fit">
                          <button onclick="voteChange('.$id.','.($voteCount+1).',0)"><i class="text-green-400 fa-solid fa-circle-arrow-up"></i></button>
                          <p class="text-white text-center p-1" id="voteCount">{{$question->que_votes}}</p>
                          <button onclick="voteChange('.$id.','.($voteCount-1).',0)"><i class="text-red-500 fa-solid fa-circle-arrow-down"></i></button>
                        </div>
                      </span>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          @endif
              
      </section>

      <!-- view more categories -->

      @include('otherque')
    </main>
    
@endsection