<x-links.link onclick="event.preventDefault(); document.getElementById('unfollow-user-form').submit();">Unfollow</x-links.link>

<x-forms.unfollow-user :user="$user" />