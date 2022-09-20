@if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-alert type="error">{{ $error }}</x-alert>
    @endforeach
@endif

@if (session()->has('message'))
    <x-alert type="success">{{ session()->get('message') }}</x-alert>
@endif