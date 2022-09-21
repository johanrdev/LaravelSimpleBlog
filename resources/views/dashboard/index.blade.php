@extends('dashboard')

@section('content')
    <!-- Section heading -->
    <x-page-header>
        <x-page-title>
                {{ __('Dashboard') }}
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

@endsection