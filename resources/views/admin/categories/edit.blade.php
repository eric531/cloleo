@extends('layouts.admin')

@section('content')
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nom :</label>
        <input type="text" name="name" value="{{ $category->name }}" required>
        
        <label>Description :</label>
        <textarea name="description">{{ $category->description }}</textarea>
        
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
