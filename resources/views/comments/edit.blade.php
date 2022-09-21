<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('Edit comment on ') . '"' . $comment->post->title . '"' }}
                        </x-page-title>

                        <x-links.return-link href="{{ route('posts.show', $comment->post) }}#comment-form" />
                    </x-page-header>

                    <x-validation-feedback />

                    <form method="POST" action="{{ route('comments.update', $comment) }}" id="reply-form">
                        @method('PUT')
                        @csrf
                    
                        <x-inputs.input-container>
                            <textarea id="text" name="text" rows="7" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required>{{ $comment->text }}</textarea>
                        </x-inputs.input-container>
                        <x-inputs.button-container>
                            <x-primary-button class="rounded-sm bg-teal-500">Update</x-primary-button>
                        </x-inputs.button-container>
                    </form>

                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>