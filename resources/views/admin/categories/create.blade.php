@extends('layouts.admin')

@section('content')
    <h1>Ajouter une catégorie</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="name" required>
        
        <label>Description :</label>
        <textarea name="description"></textarea>
        
        <button type="submit">Ajouter</button>
    </form>
@endsection
