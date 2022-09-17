<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="font-bold">You have {{ count(Auth::user()->followers)}} followers:</p>

                    @forelse (Auth::user()->followers as $follower)
                        <p>{{ $follower->name }}</p>
                    @empty
                        <p>No followers</p>
                    @endforelse

                    <br><hr><br>

                    <p class="font-bold">You follow {{ count(Auth::user()->followings) }} users:</p>

                    @forelse (Auth::user()->followings as $follower)
                        <p>{{ $follower->name }}</p>
                    @empty
                        <p>No followings</p>
                    @endforelse

                    <br><hr><br>
                    
                    <p class="font-bold">Feed: </p>

                    @if ($feed->hasPages())
                        <div class="py-6">
                            {{ $feed->appends(request()->input())->links() }}
                        </div>
                    @endif

                    @forelse ($feed as $post)
                        <x-posts.post-card :post="$post"></x-posts.post-card>
                    @empty
                        <p>Nothing to show</p>
                    @endforelse

                    @if ($feed->hasPages())
                        <div class="py-6">
                            {{ $feed->appends(request()->input())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
