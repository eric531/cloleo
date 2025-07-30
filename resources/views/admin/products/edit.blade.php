@extends('admin.template')

@section('admin')
    <main class="main-wrap">
        @include('admin.header')
        <section class="content-main">
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Modifier le produit</h2>
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="mr-5 rounded btn btn-light font-sm text-body hover-up">Voir les Produits</a>
                            <a href="{{ route('etiquette.index') }}" class="rounded btn btn-warning font-sm hover-up">Créer l'étiquette</a>
                            <button type="submit" form="productForm" class="rounded btn btn-md font-sm hover-up">Mettre à jour</button>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="col-lg-6">
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h4>Fondamental</h4>
                        </div>
                        <div class="card-body">
                            <form id="productForm" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Nom du produit</label>
                                    <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Type here" class="form-control" id="product_name" />
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description complète</label>
                                    <textarea placeholder="Type here" name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Prix</label>
                                            <input placeholder="$" name="old_price" value="{{ old('old_price', $product->old_price) }}" type="number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Prix promo</label>
                                            <input placeholder="$" name="price" value="{{ old('price', $product->price) }}" type="number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Stock</label>
                                            <input placeholder="$" name="stock" value="{{ old('stock', $product->stock) }}" type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Par</label>
                                            <input placeholder="auteur du produit" name="created_by" value="{{ old('created_by', $product->created_by) }}" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h4>Image Produit</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="{{ $product->image ? asset($product->image) : asset('/admin/assets/imgs/placeholder.jpg') }}" alt="Image preview" id="imagePreview" />
                                <input class="form-control" name="image" type="file" form="productForm" onchange="previewImage(event)" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h4>Organisation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Catégorie</label>
                                    <select class="form-select" name="category_id" form="productForm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type_product_id" form="productForm">
                                        @foreach($typeProducts as $type)
                                            <option value="{{ $type->id }}" {{ $product->type_product_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.footer')
    </main>
@endsection

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('{{ route('admin.products.update', $product->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produit mis à jour avec succès !');
            } else {
                alert('Erreur : ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erreur :', error);
            alert('Une erreur est survenue lors de la mise à jour du produit.');
        });
    });
</script>
