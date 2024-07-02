<x-layout>
    <x-header></x-header>
    <x-content>
        <x-sidebar>
            @include('components.parts.sidebar-items')
        </x-sidebar>
        <x-main>
            <x-viewtable>
                <x-slot name="head">
                    <tr>
                        <th>Naam</th>
                        <th>Geboortedatum</th>
                        <th>Woonplaats</th>
                        <th>Actie</th>
                    </tr>
                </x-slot>
                @foreach ($prisoners as $prisoner)
                    <tr>
                        <td>{{ $prisoner->profile->first_name . ' ' . $prisoner->profile->last_name }}</td>
                        <td>{{ $prisoner->profile->date_of_birth }}</td>
                        <td>{{ $prisoner->profile->city }}</td>
                    </tr>
                @endforeach
            </x-viewtable>
        </x-main>
    </x-content>
</x-layout>
