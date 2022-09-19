<x-notifications.notification-container :source="$source">
    <x-users.user-avatar :user="$source->user" class="m-3" />

    <x-notifications.notification-content>
        <x-notifications.notification-message>
            @if (strtolower($source->action) === 'deleted')
                The item was deleted.
            @else
                @if ($source->user->id === Auth::user()->id)
                    You
                @else
                    <x-links.link href="{{ route('users.show', $source->user) }}">{{ $source->user->name }}</x-links.link>
                @endif
                
                {{ strtolower($source->action) }}
                {{ strtolower(substr($source->notifiable_type, 11)) }}
                
                @if (!is_null($source->notifiable_id))
                    @if ($source->notifiable_type === 'App\Models\Comment') 
                        on <x-links.link href="{{ route('posts.show', $source->notifiable->post) }}">{{ $source->notifiable->post->title }}</x-links.link>
                    @else
                        <x-links.link href="{{ route('posts.show', $source->notifiable_id) }}">{{ $source->notifiable->title }}</x-links.link>
                    @endif
                @endif
            @endif
        </x-notifications.notification-message>
        <x-notifications.notification-timestamp>{{ $source->created_at->diffForHumans() }}</x-notifications.notification-timestamp>
    </x-notifications.notification-content>
</x-notifications.notification-container>