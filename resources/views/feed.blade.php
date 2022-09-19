<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.two-column-layout-container>
                    <!-- First column -->
                    <x-containers.two-column-layout-content>
                        <!-- Section heading -->
                        <x-page-header>
                            <x-page-title>
                                    {{ __('Feed') }}
                            </x-page-title>
                        </x-page-header>

                        @if ($notifications->hasPages())
                            <x-containers.pagination-container>
                                {{ $notifications->appends(request()->input())->links() }}
                            </x-containers.pagination-container>
                        @endif
    
                        @forelse ($notifications as $notification)
                            <x-notifications.notification :source="$notification" />
                        @empty
                            <p>Nothing to show</p>
                        @endforelse
    
                        @if ($notifications->hasPages())
                            <x-containers.pagination-container>
                                {{ $notifications->appends(request()->input())->links() }}
                            </x-containers.pagination-container>
                        @endif
                    </x-containers.two-column-layout-content>

                    <x-containers.two-column-layout-sidebar>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-title class="mb-6">Followers ({{ count(Auth::user()->followers)}}):</x-page-title>
                            
                            @forelse (Auth::user()->followers as $follower)
                                <x-link href="{{ route('users.show', $follower) }}">{{ $follower->name }}</x-link>
                            @empty
                                <p>No followers</p>
                            @endforelse
                        </x-containers.two-column-layout-sidebar-container>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-title>Following ({{ count(Auth::user()->followings)}}):</x-page-title>
                            
                            @forelse (Auth::user()->followings as $follower)
                                <x-link href="{{ route('users.show', $follower) }}">{{ $follower->name }}</x-link>
                            @empty
                                <p>No followings</p>
                            @endforelse
                        </x-containers.two-column-layout-sidebar-container>
                    </x-containers.two-column-layout-sidebar>
                </x-containers.two-column-layout-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
