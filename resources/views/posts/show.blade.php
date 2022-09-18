<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
                    <x-return-link :href="route('browse')" />

                    <x-posts.post-image :post="$post" class="h-128"></x-posts.post-image>
                    
                    <x-posts.post-article-content>
                        <x-posts.post-title :post="$post" :isLink="false" class="text-center" />
                            
                        <x-posts.post-meta-header class="justify-center">
                            <x-posts.post-meta :post="$post" />
                            <x-posts.post-action :post="$post" />
                        </x-posts.post-meta-header>
                        
                        <x-posts.post-body :post="$post" :is-excerpt="false" />
                        <x-posts.post-categories :post="$post" />
                        
                        <x-posts.author-container>
                            <x-users.user-avatar :user="$post->user" :isLarge="true" />
                                
                            <x-posts.author-content>
                                <x-posts.author-title>About the Author</x-posts.author-title>
                                <x-posts.author-description>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore neque quisquam ratione sit nesciunt, praesentium dolore? Tempora quo sed inventore cumque minima voluptates unde voluptatibus labore, rem error sapiente amet?
                                </x-posts.author-description>
                            </x-posts.author-content>
                        </x-posts.author-container>

                        @if (Auth::check())
                            <x-page-header>
                                <x-page-title>
                                    {{ __('Add a comment') }}
                                </x-page-title>
                            </x-page-header>

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

                        <x-page-header>
                            <x-page-title>
                                {{ count($comments) . __(' comment(s)') }}
                            </x-page-title>
                        </x-page-header>

                        <div class="mt-3">
                            @if ($comments->hasPages())
                                <x-pagination-container>
                                    {{ $comments->fragment('comment-form')->links() }}
                                </x-pagination-container>
                            @endif

                            @include('posts.partials.comment', ['comments' => $comments])

                            @if ($comments->hasPages())
                                <x-pagination-container>
                                    {{ $comments->fragment('comment-form')->links() }}
                                </x-pagination-container>
                            @endif
                        </div>
                    </x-posts.post-article-content>
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>
