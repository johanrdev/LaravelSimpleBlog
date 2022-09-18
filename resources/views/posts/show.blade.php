<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('browse') }}" class="font-bold flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        
                        <span>Go back</span>
                    </a>
                    <div class="lg:col-span-4 mb-0 h-60 md:h-80 lg:h-128 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat flex flex-col justify-center items-center"></div>
                    <div class="md:p-6 lg:p-12">
                        <div class="mt-3 mb-12 text-center">
                            <h1 class="text-2xl md:text-3xl lg:text-3xl font-bold break-all mb-3">{{ $post->title }}</h1>
                            <span class="italic">Published {{ $post->created_at->diffForHumans() }} by
                                <a href="{{ route('getUserBlog', $post->user) }}" class="text-rose-500 font-bold underline">{{ $post->user->name }}</a>
                            </span>
                        </div>
                        <p class="mb-12 leading-relaxed md:leading-loose text-md md:text-lg break-all">{!! nl2br(e($post->body)) !!}</p>
                        <hr>
                        <ul class="my-6 font-bold rounded flex flex-wrap">
                            @foreach ($post->categories as $category)
                                <li class="my-0.5 mr-1">
                                    <a href="#" class="block text-rose-500 px-4 py-1 bg-slate-200 hover:bg-slate-300 transition-all duration-250">
                                        <span class="font-bold rounded-xs">{{ $category->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        
                        <div class="border-gray-200 border mt-12 mb-6 p-6 md:p-12 rounded flex flex-col md:flex-row items-center gap-6 bg-slate-50">
                            {{-- <div class="bg-gray-400 w-20 h-20 rounded shrink-0"></div> --}}
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" alt="" class="w-20 h-20 md:w-40 md:h-40 rounded-full shrink-0 border">
                            <div class="flex flex-col text-center md:text-left">
                                <h1 class="font-bold text-xl md:text-2xl">About the Author</h1>
                                <p class="text-md md:text-lg italic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore neque quisquam ratione sit nesciunt, praesentium dolore? Tempora quo sed inventore cumque minima voluptates unde voluptatibus labore, rem error sapiente amet?</p>
                            </div>
                        </div>

                        @if (Auth::check())
                            <div class="mt-12 mb-3">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                                    {{ __('Add a comment') }}
                                </h2>
                            </div>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="text-rose-500 font-bold">{{ $error }}</p>
                                @endforeach
                            @endif
                        
                            <form method="POST" action="{{ route('addComment', $post) }}" id="comment-form">
                                @csrf

                                <div class="mt-3">
                                    <textarea id="text" name="text" rows="7" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required></textarea>
                                </div>
                                <div class="mt-3 flex justify-end">
                                    <x-primary-button class="rounded-sm bg-teal-500">Publish</x-primary-button>
                                </div>
                            </form>
                        @endif

                        <div class="mt-12 mb-3">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                                {{ count($post->comments) . __(' comment(s)') }}
                            </h2>
                        </div>

                        <div class="mt-3">
                            @if ($comments->hasPages())
                                <div class="py-6">
                                    {{ $comments->fragment('comment-form')->links() }}
                                </div>
                            @endif

                            @forelse ($comments as $comment)
                                <div class="odd:bg-slate-100 border-gray-300 border p-3 my-3 rounded">
                                    <h3 class="font-bold text-lg">
                                        <a href="{{ route('getUserBlog', $comment->user) }}" class="text-rose-500 font-bold underline">{{ $comment->user->name }}</a> published:
                                    </h3>
                                    <ul class="mb-3 flex">
                                        <li>{{ $comment->created_at->diffForHumans() }}</li>
                                        @if (Auth::check())
                                            @if (Auth::user()->id === $comment->user->id || $post->user->id === Auth::user()->id)
                                                <li class="before:mx-2 before:content-['/']"><a href="{{ route('comments.edit', $comment) }}" class="text-rose-500 font-bold underline italic">Edit</a></li>
                                                <li class="before:mx-2 before:content-['/']"><a href="#"" onclick="event.preventDefault(); document.getElementById('delete-comment-form').submit();" class="text-rose-500 font-bold underline italic">Delete</a></li>
    
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}" id="delete-comment-form">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            @endif
                                        @endif
                                    </ul>
                                    <p class="text-lg leading-relaxed">{{ $comment->text }}</p>
                                </div>
                            @empty
                                <p>Nothing to show</p>
                            @endforelse

                            @if ($comments->hasPages())
                                <div class="py-6">
                                    {{ $comments->fragment('comment-form')->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
