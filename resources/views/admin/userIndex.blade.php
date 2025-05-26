@extends('layouts.layout')

@section('content')
<h1>Gebruikersoverzicht</h1>

<table cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <select name="role">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <button type="submit">Opslaan</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection