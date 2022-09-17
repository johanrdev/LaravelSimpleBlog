<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('posts.index') }}" class="font-bold flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                          
                        <span>Go back</span>
                    </a>
                    <div class="lg:col-span-4 mb-0 h-60 md:h-80 lg:h-128 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat opacity-75 hover:opacity-100 transition-all duration-500 flex flex-col justify-center items-center">
                        {{-- <div class="hidden lg:flex flex-col backdrop-brightness-50 p-12 rounded text-white items-center">
                            <span class="text-4xl drop-shadow-lg shadow-black">{{ $post->title }}</span>
                            <span class="text-xl italic mt-3 lg:mt-0 py-2 rounded flex flex-col md:flex-row flex-wrap">
                                Published {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
                            </span>
                        </div> --}}
                    </div>
                    <div class="md:p-6 lg:p-12">
                        <div class="my-3">
                            <h1 class="text-2xl md:text-3xl lg:text-3xl font-bold">{{ $post->title }}</h1>
                            <span class="font-bold text-md italic">Published {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</span>
                        </div>
                        <p class="mb-6 leading-relaxed md:leading-loose text-md md:text-lg">{!! nl2br(e($post->body)) !!}</p>
                        <ul class="mb-24 font-bold text-xs lg:mt-0 rounded flex flex-wrap">
                            @foreach ($post->categories as $category)
                                <li>
                                    <span class="bg-gray-200 text-gray-800 text-xs font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        <a href="#" class="text-rose-500 underline">{{ $category->name }}</a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="border-gray-200 border mb-6 p-6 md:p-12 rounded flex flex-col md:flex-row items-center gap-6">
                            {{-- <div class="bg-gray-400 w-20 h-20 rounded shrink-0"></div> --}}
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" alt="" class="w-20 h-20 md:w-40 md:h-40 rounded-full shrink-0">
                            <div class="flex flex-col text-center md:text-left">
                                <h1 class="font-bold text-xl md:text-2xl">About the Author</h1>
                                <p class="text-md md:text-lg italic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore neque quisquam ratione sit nesciunt, praesentium dolore? Tempora quo sed inventore cumque minima voluptates unde voluptatibus labore, rem error sapiente amet?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
