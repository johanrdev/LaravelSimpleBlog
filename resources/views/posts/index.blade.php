<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($user)) 
                {{ $user->name }}'s blog
            @else
                {{ __('Posts') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf

                        <input type="text" name="term" placeholder="Search posts" />
                        <x-primary-button>Submit</x-primary-button>
                    </form>

                    @if ($posts->hasPages())
                        <div class="py-6">
                            {{ $posts->appends(request()->input())->links() }}
                        </div>
                    @endif
                    
                    @foreach ($posts as $post)
                        <x-posts.post-card :post="$post" />
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
