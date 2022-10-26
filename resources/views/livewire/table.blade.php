<table>
    <thead>
    <tr>
        <td><a href="#" wire:click="sortBy('name')">Name</a></td>
        <td><a href="#" wire:click="sortBy('email')">Email</a></td>
        <td><a href="#" wire:click="sortBy('birthdate')">Birthdate</a></td>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->birthdate->toFormattedDateString() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $contacts->links() }}
