<x-links.link onclick="event.preventDefault(); document.getElementById('follow-user-form').submit();">Follow</x-links.link>

<x-forms.follow-user :user="$user" />