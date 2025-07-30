@extends('layouts.admin')

@section('content')
    <h1>Modifier l'utilisateur</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Email :</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>Rôle :</label>
        <select name="role">
            @foreach($roles as $role)
                <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
