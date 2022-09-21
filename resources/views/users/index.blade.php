<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('All users') }}
                        </x-page-title>
                    </x-page-header>

                    @if ($users->hasPages())
                        <x-containers.pagination-container>
                            {{ $users->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                    
                    @foreach ($users as $user)
                        <p><x-links.link href="{{ route('users.show', $user) }}">{{ $user->blog_name }}</x-links.link></p>
                    @endforeach

                    @if ($users->hasPages())
                        <x-containers.pagination-container>
                            {{ $users->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
