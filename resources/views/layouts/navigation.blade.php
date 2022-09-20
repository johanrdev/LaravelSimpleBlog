<nav x-data="{ open: false }" class="bg-teal-500 border-b-4 border-teal-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('feed') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-teal-100" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:-my-1 sm:ml-10 sm:flex">
                    @if (Auth::check())
                        <x-links.nav-link :href="route('feed')" :active="request()->routeIs('feed')">
                            {{ __('Feed') }}
                        </x-links.nav-link>
                    @endif
                    <x-links.nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Browse') }}
                    </x-links.nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::check())
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-md font-bold text-teal-100 hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Signed in as {{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            @if (Auth::check())
                                <x-links.dropdown-link :href="route('posts.create')">
                                    {{ __('Write post') }}
                                </x-links.dropdown-link>
                                <x-links.dropdown-link :href="route('users.edit', Auth::user())">
                                    {{ __('Edit settings') }}
                                </x-links.dropdown-link>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-links.dropdown-link class="border-gray-200 border-t" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-links.dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:-my-1 sm:flex sm:ml-6">
                    <x-links.nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-links.nav-link>
                    <x-links.nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-links.nav-link>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-teal-100 hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-teal-600">
        <div class="pt-2 pb-3">
            <x-links.responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Browse') }}
            </x-links.responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::check())
            <div class="pt-4 pb-1 border-t border-teal-400">
                <div class="px-4">
                    <div class="font-bold text-base text-teal-200">Signed in as {{ Auth::user()->name }}</div>
                    {{-- <div class="font-bold text-sm text-teal-200">{{ Auth::user()->email }}</div> --}}
                </div>

                <div class="mt-3">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-links.responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-links.responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
