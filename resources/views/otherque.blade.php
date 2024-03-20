<!-- questions -->
<section class="bg-gray-900 p-10 flex flex-col gap-10" id="question">
    <h2
      class="text-3xl text-white font-semibold border border-2 border-green-400 w-fit px-4 py-2"
    >
      ?> "{Other Questions in this Category}"
    </h2>
   
      @if($questions->isEmpty())
        <div class="flex flex-col rounded-lg bg-gray-800">
          <p class="width-full text-3xl py-3 text-white">
            <strong class="text-yellow-400  pl-5">OOPS!!</strong> No questions yet on this category
          </p>
        </div>
      @else
        @foreach ($questions as $question)
          <div class="flex gap-10 bg-gray-800 rounded-lg py-3 px-5">
            <article class="flex flex-col gap-3 question w-full">
              <h3 class="text-2xl text-yellow-500 font-semibold flex gap-2 justify-between">
                <a href="{{route('question.show', ['question' => $question])}}" class="cursor-pointer">{{$question->que_title}}</a>
                <span class="text-sm text-white">By user <strong class="text-green-600">{{$question->by_username}}</strong></span>
              </h3>
              <p class="text-md text-white/50 w-4/5">
                {{ substr($question->que_desc , 0 , 50).'....'}}
              </p>
              <div class="text-center mt-2 leading-none flex justify-between w-full">
                <div class="text-white"><span class="text-yellow-500">Posted on : </span>{{$question->posted_at}}</div>
                <div>
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
                  </svg>{{$question->que_views}}
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
                    </svg>{{$question->comments}}
                  </span>
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