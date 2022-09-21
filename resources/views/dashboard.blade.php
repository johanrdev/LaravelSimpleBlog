<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.two-column-layout-container>
                    <!-- First column -->
                    <x-containers.two-column-layout-content>
                        <!-- Section heading -->
                        {{-- <x-page-header>
                            <x-page-title>
                                    {{ __('Dashboard') }}
                            </x-page-title>
                        </x-page-header> --}}

                       @yield('content')
                    </x-containers.two-column-layout-content>

                    <x-containers.two-column-layout-sidebar>
                        <x-containers.two-column-layout-sidebar-container>
                            <ul>
                                <li><x-links.link href="{{ route('dashboard.index') }}">Dashboard</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.posts') }}">Posts</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.categories') }}">Categories</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.followers') }}">Followers</x-links.link></li>
                                <li><x-links.link href="{{ route('dashboard.followings') }}">Followings</x-links.link></li>
                            </ul>
                        </x-containers.two-column-layout-sidebar-container>
                    </x-containers.two-column-layout-sidebar>
                </x-containers.two-column-layout-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>