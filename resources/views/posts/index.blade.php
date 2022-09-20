<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            @if (isset($user)) 
                                {{ $user->name }}'s blog
                            @else
                                {{ __('Browse all posts') }}
                            @endif
                        </x-page-title>
                    </x-page-header>

                    <x-forms.search-post />

                    @if ($posts->hasPages())
                        <x-containers.pagination-container>
                            {{ $posts->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                    
                    @foreach ($posts as $post)
                        <x-posts.post-card :post="$post" />
                    @endforeach

                    @if ($posts->hasPages())
                        <x-containers.pagination-container>
                            {{ $posts->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
