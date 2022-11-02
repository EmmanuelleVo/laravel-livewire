@props([
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator */
    'contacts', 'qp', 'sortOrder'
])
@php
    $qpf = array_filter($qp, fn($p) => $p !== 'sort-field', ARRAY_FILTER_USE_KEY)
@endphp

<table id="table">
    <thead>
    <tr>
        <td><a href="/?{{ http_build_query($qpf) }}&sort-field=name&sort-order={{$sortOrder === 'ASC' ? 'DESC' : 'ASC'}}">Name</a></td>
        <td><a href="/?{{ http_build_query($qpf) }}&sort-field=email&sort-order={{$sortOrder === 'ASC' ? 'DESC' : 'ASC'}}">Email</a></td>
        <td><a href="/?{{ http_build_query($qpf) }}&sort-field=birthplace&sort-order={{$sortOrder === 'ASC' ? 'DESC' : 'ASC'}}">Birthdate</a></td>
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
