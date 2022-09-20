<x-links.link onclick="event.preventDefault(); document.getElementById('unfollow-user-form').submit();">Unfollow {{ $user->name }}?</x-links.link>

<x-forms.unfollow-user :user="$user" />