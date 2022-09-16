<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($posts->hasPages())
                        <div class="py-6">
                            {{ $posts->appends(request()->input())->links() }}
                        </div>
                    @endif

                    @if (isset($user)) 
                        <h2 class="font-bold text-3xl text-center">{{ $user->name }}'s blog</h2>
                    @endif
                    
                    @foreach ($posts as $post)
                        <div class="border-b-gray-200 border-b last:border-0 py-6">
                            <h1 class="text-xl font-bold">{{ $post->title }}</h1>
                            <ul class="font-bold mb-3 italic flex">
                                <li class="after:mx-2 after:content-['/']">Created {{ $post->created_at->diffForHumans() }}</li>
                                <li class="after:mx-2 after:content-['/']">by <a href="{{ route('getUserPosts', $post->user) }}" class="text-rose-500 underline">{{ $post->user->name }}</a></li>
                                <li>Filed in: 
                                    @foreach ($post->categories as $category)
                                        <a class="text-rose-500 underline" href="?category={{ $category->name }}">{{ $category->name }}</a>{{ $loop->index < $loop->count - 1 ? ', ' : '' }}
                                    @endforeach
                                </li>
                            </ul>
                            <p>{{ $post->body }}</p>
                        </div>
                    @endforeach

                    @if ($posts->hasPages())
                        <div class="py-6">
                            {{ $posts->appends(request()->input())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
