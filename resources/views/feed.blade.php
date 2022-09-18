<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-two-column-layout-container>
                    <!-- First column -->
                    <x-two-column-layout-content>
                        <!-- Section heading -->
                        <x-page-header>
                            <x-page-title>
                                    {{ __('Feed') }}
                            </x-page-title>
                        </x-page-header>

                        @if ($notifications->hasPages())
                            <x-pagination-container>
                                {{ $notifications->appends(request()->input())->links() }}
                            </x-pagination-container>
                        @endif
    
                        @forelse ($notifications as $notification)
                            <x-notifications.notification :source="$notification" />
                        @empty
                            <p>Nothing to show</p>
                        @endforelse
    
                        @if ($notifications->hasPages())
                            <x-pagination-container>
                                {{ $notifications->appends(request()->input())->links() }}
                            </x-pagination-container>
                        @endif
                    </x-two-column-layout-container>

                    <x-two-column-layout-sidebar>
                        <x-two-column-layout-sidebar-container>
                            <x-page-title class="mb-6">Followers ({{ count(Auth::user()->followers)}}):</x-page-title>
                            
                            @forelse (Auth::user()->followers as $follower)
                                <x-link href="{{ route('users.show', $follower) }}">{{ $follower->name }}</x-link>
                            @empty
                                <p>No followers</p>
                            @endforelse
                        </x-two-column-layout-sidebar-container>
                        <x-two-column-layout-sidebar-container>
                            <x-page-title>Following ({{ count(Auth::user()->followings)}}):</x-page-title>
                            
                            @forelse (Auth::user()->followings as $follower)
                                <x-link href="{{ route('users.show', $follower) }}">{{ $follower->name }}</x-link>
                            @empty
                                <p>No followings</p>
                            @endforelse
                        </x-two-column-layout-sidebar-container>
                    </x-two-column-layout-sidebar>
                </x-two-column-layout-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>
