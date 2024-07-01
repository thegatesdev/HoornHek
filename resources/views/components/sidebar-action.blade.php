@props(['title' => 'None'])

<div class="sidebar-action">
    <h1>{{ $title }}</h1>
    {{ $slot }}
</div>
