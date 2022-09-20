<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ $user->name }}
                        </x-page-title>

                        <p>{{ $user->description }}</p>
                    </x-page-header>

                    <div class="flex">
                        @if (Auth::user()->id !== $user->id)
                            @if (Auth::user()->followings->contains($user))
                                {{-- <p>You are following {{ $user->name }}!</p> --}}
                                
                                <x-links.unfollow-link :user="$user" />
                            @else
                                <x-links.follow-link :user="$user" />
                            @endif
                        @endif
                    </div>
                </x-containers.inner-container>
            </x-containers.container>
            <x-containers.container class="mt-3">
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ $user->blog_name }}
                        </x-page-title>

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
                    </x-page-header>
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
