<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                        {{ $user->name . __('\'s profile') }}
                    </h2>

                    <div>
                        @if (Auth::user()->id !== $user->id)
                            @if (Auth::user()->followings->contains($user))
                                <p>You are following {{ $user->name }}!</p>
                                <a onclick="event.preventDefault(); document.getElementById('unfollow-user-form').submit();" class="cursor-pointer">Unfollow {{ $user->name }}?</a>

                                <form method="POST" action="{{ route('unfollow', $user) }}" id="unfollow-user-form">
                                    @csrf
                                </form>
                            @else
                                <a onclick="event.preventDefault(); document.getElementById('follow-user-form').submit();" class="cursor-pointer">Follow {{ $user->name }}</a>

                                <form method="POST" action="{{ route('follow', $user) }}" id="follow-user-form">
                                    @csrf
                                </form>
                            @endif
                        @endif
                    </div>
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>
