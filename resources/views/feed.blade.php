<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-12">
                    <!-- First column -->
                    <div class="col-span-8 pr-6">
                        <!-- Section heading -->
                        <div class="mb-6">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                                {{ __('Feed') }}
                            </h2>

                            <p>Showing the recent events from the people you follow.</p>
                        </div>

                        @if ($feed->hasPages())
                            <div class="py-6">
                                {{ $feed->appends(request()->input())->links() }}
                            </div>
                        @endif
    
                        @forelse ($feed as $post)
                            {{-- <x-posts.post-card :post="$post"></x-posts.post-card> --}}

                            <div class="flex border-gray-300 border-b items-center odd:bg-slate-100">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" alt="" class="m-3 w-10 h-10 rounded shrink-0 border">

                                <div class="flex flex-col p-3">
                                    <span>
                                        <a href="{{ route('users.show', $post->user) }}" class="text-rose-500 font-bold underline">{{ $post->user->name }}</a> published "<a href="{{ route('posts.show', $post) }}" class="text-rose-500 font-bold underline">{{ $post->title }}</a>"!
                                    </span>
                                    <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <p>Nothing to show</p>
                        @endforelse
    
                        @if ($feed->hasPages())
                            <div class="py-6">
                                {{ $feed->appends(request()->input())->links() }}
                            </div>
                        @endif
                    </div>

                    <!-- Second column -->
                    <div class="col-span-4 border-l pl-6">
                        <div class="flex flex-col border-gray-300 mb-12">
                            <!-- Section heading -->
                            <div class="mb-6">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    Followers ({{ count(Auth::user()->followers)}}):
                                </h2>
                            </div>

                            @forelse (Auth::user()->followers as $follower)
                                <a href="{{ route('users.show', $follower) }}" class="text-rose-500 font-bold underline">{{ $follower->name }}</a>
                            @empty
                                <p>No followers</p>
                            @endforelse
                        </div>
                        <div class="flex flex-col border-gray-300">
                            <!-- Section heading -->
                            <div class="mb-6">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    Following ({{ count(Auth::user()->followings)}}):
                                </h2>
                            </div>

                            @forelse (Auth::user()->followings as $follower)
                                <a href="{{ route('users.show', $follower) }}" class="text-rose-500 font-bold underline">{{ $follower->name }}</a>
                            @empty
                                <p>No followings</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
