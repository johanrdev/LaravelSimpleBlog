<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-page-header>
                        <x-page-title>
                            @if (isset($user)) 
                                {{ $user->name }}'s blog
                            @else
                                {{ __('Browse all posts') }}
                            @endif
                        </x-page-title>
                    </x-page-header>

                    <form method="POST" action="{{ route('search') }}">
                        @csrf

                        <div class="flex {{ $posts->hasPages() ? 'mb-0' : 'mb-6' }}">
                            <x-text-input id="term" class="block grow mr-1" type="text" name="term" placeholder="Search by title, text, category or author name" required />
                            {{-- <input class="grow mr-1 border-gray-400 rounded-sm" type="text" name="term" placeholder="Search by title, text, category or author name" /> --}}
                            <x-primary-button class="rounded-sm bg-teal-500">Search</x-primary-button>
                        </div>
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
