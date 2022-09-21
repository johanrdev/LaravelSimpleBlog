<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-links.return-link :href="route('posts.index')" />

                    <x-posts.post-image :post="$post" class="h-128"></x-posts.post-image>
                    
                    <x-posts.post-article-content>
                        <x-posts.post-title :post="$post" :is-link="false" class="text-center" />
                            
                        <x-posts.post-meta-header class="justify-center">
                            <x-posts.post-meta :post="$post" />
                            <x-posts.post-action :post="$post" />
                        </x-posts.post-meta-header>
                        
                        <x-posts.post-body :post="$post" :is-excerpt="false" />
                        <x-posts.post-categories :post="$post" />
                        
                        <x-posts.author-container>
                            <x-users.user-avatar :user="$post->user" :is-large="true" />
                                
                            <x-posts.author-content>
                                <x-posts.author-title>About the Author</x-posts.author-title>
                                <x-posts.author-description>
                                    {{ $post->user->description }}
                                </x-posts.author-description>
                            </x-posts.author-content>
                        </x-posts.author-container>

                        @if (Auth::check())
                            <x-page-header>
                                <x-page-title>
                                    {{ __('Add a comment') }}
                                </x-page-title>
                            </x-page-header>

                            <x-validation-feedback />
                        
                            <x-forms.create-comment :post="$post" />
                        @endif

                        <x-page-header>
                            <x-page-title>
                                {{ count($comments) . __(' comment(s)') }}
                            </x-page-title>
                        </x-page-header>

                        <div class="mt-3">
                            @if ($comments->hasPages())
                                <x-containers.pagination-container>
                                    {{ $comments->fragment('comment-form')->links() }}
                                </x-containers.pagination-container>
                            @endif

                            @include('posts.partials.comment', ['comments' => $comments])

                            @if ($comments->hasPages())
                                <x-containers.pagination-container>
                                    {{ $comments->fragment('comment-form')->links() }}
                                </x-containers.pagination-container>
                            @endif
                        </div>
                    </x-posts.post-article-content>
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
