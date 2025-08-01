@extends('admin.template')

@section('admin')

    <main class="main-wrap">
       @include('admin.header')
        <section class="content-main">
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Ajouter Nouveau produit</h2>
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="mr-5 rounded btn btn-light font-sm text-body hover-up">Voir les Produits</a>
                            <a href="{{ route('etiquette.index') }}" class="rounded btn btn-warning font-sm hover-up">Créer l'etiquette</a>
                            <button type="submit" form="productForm" class="rounded btn btn-md font-sm hover-up">Ajouter</button>
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


                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Par</label>
                                            <input placeholder="auteur du produit" name="created_by" type="text" class="form-control" />
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
                                <img src="{{ asset('/admin/assets/imgs/placeholder.jpg') }}" alt="Image preview" id="imagePreview" />
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
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id" form="productForm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
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
