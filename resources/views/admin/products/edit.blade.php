@extends('layouts.admin')

@section('content')
    <h1>Modifier le produit : {{ $product->name }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>

        <label>Description :</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <label>Prix :</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>

        <label>Stock :</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>

        <label>Catégorie :</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Image actuelle :</label>
        @if($product->image)
            <div>
                <img src="{{ asset($product->image) }}" alt="Image du produit" width="100">
            </div>
        @endif

        <label>Nouvelle image :</label>
        <input type="file" name="image">

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('admin.products.index') }}">Retour à la liste des produits</a>
@endsection
