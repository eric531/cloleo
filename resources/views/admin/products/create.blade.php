@extends('admin.template')

@section('admin')
    {{-- <h1>Ajouter un produit</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Description :</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Prix :</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>

        <label>Stock :</label>
        <input type="number" name="stock" value="{{ old('stock') }}" required>

        <label>Catégorie :</label>
        <select name="category_id" required>
            <option value="">-- Sélectionner une catégorie --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label>Image :</label>
        <input type="file" name="image">

        <button type="submit">Ajouter le produit</button>
    </form>

    <a href="{{ route('admin.products.index') }}">Retour à la liste des produits</a> --}}


    <main class="main-wrap">
       @include('admin.header')
        <section class="content-main">
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Ajouter Nouveau produit</h2>
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Voir les Produits</a>
                            <a href="{{ route('etiquette.index') }}" class="btn btn-warning rounded font-sm hover-up">Créer l'etiquette</a>
                            <button type="submit" form="productForm" class="btn btn-md rounded font-sm hover-up">Ajouter</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Fondamental</h4>
                        </div>
                        <div class="card-body">
                            <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Product title</label>
                                    <input type="text" name="name" placeholder="Type here" class="form-control" id="product_name" />
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Full description</label>
                                    <textarea placeholder="Type here" name="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Prix</label>
                                            <div class="row gx-2">
                                                <input placeholder="$" name="old_price" type="number" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Prix promo</label>
                                            <input placeholder="$" name="price" type="number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Stock</label>
                                            <input placeholder="$" name="stock" type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Tax rate</label>
                                    <input type="text" placeholder="%" name="tax_rate" class="form-control" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Image Produit</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="{{ asset('/admin/assets/imgs/placeholder.jpg') }}" alt="Image preview" id="imagePreview" />
                                <input class="form-control" name="image" type="file" form="productForm" onchange="previewImage(event)" />
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Organisation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id" form="productForm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type_product_id" form="productForm">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- content-main end// -->
        @include('admin.footer')
    </main>
@endsection


<!-- Script AJAX pour soumettre le formulaire -->
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
        e.preventDefault(); // Empêche le comportement par défaut du formulaire

        const formData = new FormData(this); // Récupère toutes les données du formulaire, y compris les fichiers

        fetch('{{ route('admin.products.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produit ajouté avec succès !');
                document.getElementById('productForm').reset(); // Réinitialise le formulaire
                document.getElementById('imagePreview').src = '{{ asset('assets/imgs/placeholder.jpg') }}'; // Réinitialise l'aperçu
            } else {
                alert('Erreur : ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erreur :', error);
            alert('Une erreur est survenue lors de l\'ajout du produit.');
        });
    });
</script>