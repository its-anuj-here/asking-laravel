@extends('layout')
@section('title', 'Update Category')
@section('content')
    <section class="text-gray-400 bg-gray-900 body-font pt-10">
        <div class="container px-10 py-24 mx-auto flex flex-col flex-wrap items-left">
            <div class="lg:w-3/5 md:w-1/2 px-2 lg:pr-0 pr-0">
                <h3 class="title-font font-medium text-4xl text-white">
                Update Category
                </h3>
                
            </div>
            <div
                class=" bg-gray-800 bg-opacity-50 rounded-lg p-10 flex flex-col w-full mt-5"
            >
                <h2 class="text-white text-lg font-medium title-font mb-5">Category</h2>
                <form action="category.update.put" method="post">
                    @csrf
                    @method('put')
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-400"
                            >Name</label
                        >
                        <input
                            required
                            type="text"
                            id="name"
                            name="name"
                            value=""
                            class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        />
                    </div>
                    <div class="relative mb-4">
                        <label for="description" class="leading-7 text-sm text-gray-400"
                            >Description</label
                        >
                        <textarea
                            id="description"
                            name="description"
                            value=""
                            rows="3"
                            class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-yellow-900 rounded border border-gray-600 focus:border-yellow-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg"
                        >
                        Update
                    </button>
                </form>
                <div class="flex gap-2 py-5 text-white/50 text-sm">
                    <p>Want to check existing categories ?</p><br>
                    <a class="underline underline-offset-8" href="{{route('category.all')}}">
                        All Categories
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection