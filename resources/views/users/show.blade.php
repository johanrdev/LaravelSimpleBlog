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
                                
                                <x-links.unfollow-link :user="$user" />
                            @else
                                <x-links.follow-link :user="$user" />
                            @endif
                        @endif
                    </div>
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
