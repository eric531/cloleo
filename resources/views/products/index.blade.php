<form action="{{ route('favorites.toggle', $product->id) }}" method="POST">
    @csrf
    <button type="submit">
        ❤️ {{ $product->favoritedByUsers->count() }}
    </button>
</form>