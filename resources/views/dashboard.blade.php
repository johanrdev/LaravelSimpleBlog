<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.two-column-layout-container>
                    <!-- First column -->
                    <x-containers.two-column-layout-content>
                        <x-validation-feedback />

                       @yield('content')
                    </x-containers.two-column-layout-content>

                    <x-containers.two-column-layout-sidebar>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-header>
                                <x-page-title>
                                        {{ __('Dashboard') }}
                                </x-page-title>
                            </x-page-header>
                            <ul>
                                <li><x-links.link href="{{ route('dashboard.index') }}">Dashboard</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.posts') }}">Posts</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.categories') }}">Categories</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.followers') }}">Followers</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.followings') }}">Followings</x-links.link></li>
                            </ul>
                        </x-containers.two-column-layout-sidebar-container>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-header>
                                <x-page-title>
                                        {{ __('Create') }}
                                </x-page-title>
                            </x-page-header>
                            <ul>
                                <li><x-links.link href="{{ route('posts.create') }}">New post</x-links.link></li>
                                <li><x-links.link href="{{ route('categories.create') }}">New category</x-links.link></li>
                            </ul>
                        </x-containers.two-column-layout-sidebar-container>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-header>
                                <x-page-title>
                                        {{ __('Followers ') . '(' . Auth::user()->followers()->count() . ')' }}
                                </x-page-title>
                            </x-page-header>
                            <ul class="max-h-40 overflow-y-auto">
                                @forelse (Auth::user()->followers as $follower)
                                    <x-links.link href="{{ route('users.show', $follower) }}" class="block odd:bg-gray-200 p-1">{{ $follower->name }}</x-links>
                                @empty
                                    <p>No followers</p>
                                @endforelse
                            </ul>
                        </x-containers.two-column-layout-sidebar-container>
                        <x-containers.two-column-layout-sidebar-container>
                            <x-page-header>
                                <x-page-title>
                                    {{ __('Followings ') . '(' . Auth::user()->followings()->count() . ')' }}
                                </x-page-title>
                            </x-page-header>
                            <ul class="max-h-40 overflow-y-auto">
                                @forelse (Auth::user()->followings as $following)
                                    <x-links.link href="{{ route('users.show', $following) }}" class="block odd:bg-gray-200 p-1">{{ $following->name }}</x-links>
                                @empty
                                    <p>No followings</p>
                                @endforelse
                            </ul>
                        </x-containers.two-column-layout-sidebar-container>
                    </x-containers.two-column-layout-sidebar>
                </x-containers.two-column-layout-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>