<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ $user->name . __('\'s profile') }}
                        </x-page-title>
                    </x-page-header>

                    <div>
                        @if (Auth::user()->id !== $user->id)
                            @if (Auth::user()->followings->contains($user))
                                <p>You are following {{ $user->name }}!</p>
                                <x-links.link onclick="event.preventDefault(); document.getElementById('unfollow-user-form').submit();" class="cursor-pointer">Unfollow {{ $user->name }}?</x-links.link>

                                <form method="POST" action="{{ route('unfollow', $user) }}" id="unfollow-user-form">
                                    @csrf
                                </form>
                            @else
                                <x-links.link onclick="event.preventDefault(); document.getElementById('follow-user-form').submit();" class="cursor-pointer">Follow {{ $user->name }}</x-links.link>

                                <form method="POST" action="{{ route('follow', $user) }}" id="follow-user-form">
                                    @csrf
                                </form>
                            @endif
                        @endif
                    </div>
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
