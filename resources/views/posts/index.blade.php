<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
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

                        <div class="flex">
                            <x-text-input id="term" class="block grow mr-1" type="text" name="term" placeholder="Search by title, text, category or author name" required />
                            <x-primary-button class="rounded-sm bg-teal-500">Search</x-primary-button>
                        </div>
                    </form>

                    @if ($posts->hasPages())
                        <x-pagination-container>
                            {{ $posts->appends(request()->input())->links() }}
                        </x-pagination-container>
                    @endif
                    
                    @foreach ($posts as $post)
                        <x-posts.post-card :post="$post" />
                    @endforeach

                    @if ($posts->hasPages())
                        <x-pagination-container>
                            {{ $posts->appends(request()->input())->links() }}
                        </x-pagination-container>
                    @endif
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>
