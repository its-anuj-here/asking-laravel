<section
        class="w-full p-10 flex justify-start pt-[12rem] bg-gray-900 banner"
        style="background: url('{{ asset('storage/ghoda.png') }}') no-repeat rgb(17 24 39); background-position: 70rem 10rem;"
>
    <article class="flex flex-col gap-7">
        <h2 class="text-4xl text-white font-bold">Explore Categories !!</h2>
        <div class="w-[20%] h-2 rounded-full bg-yellow-500 inline-flex"></div>
        <p class="text-white/70 w-[60%]">
            <b>AsKing</b> provides you lots of Categories, on which you can have a discussion with other users in Live Time.
            You can ask questions, and answers other users queries. You can also check views and comment on your query and answers.
        </p>
        <button
            class="self-start justify-self-start px-4 py-2 border border-2 border-white text-yellow-400"
            onclick="window.location.href='{{route('category.all')}}';"
        >
            Explore Now
        </button>
    </article>
</section>