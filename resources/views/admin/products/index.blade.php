@extends('admin.template')

@section('admin')
<main class="main-wrap">
@include('admin.header')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products</h2>
            {{-- <p>Lorem ipsum dolor sit amet.</p> --}}
        </div>
        <div>
            <a href="#" class="rounded btn btn-light font-md">Export</a>
            <a href="#" class="rounded btn btn-light font-md">Import</a>
            <a href="{{ route('admin.products.create') }}" class="rounded btn btn-primary btn-sm">Create new</a>
        </div>
    </div>
                 @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>

                @endif
                
    <div class="mb-4 card">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>All category</option>
                        @foreach ($categories as $categorie )
                        <option>{{ $categorie->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Latest added</option>
                        <option>Cheap first</option>
                        <option>Most viewed</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                @foreach ($products as $product)
                <div class="col">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img style="width: 300px; height: 200px;" src="{{ asset($product->image) }}" alt="Product" /> </a>
                        <div class="info-wrap">
                            <a href="#" class="title text-truncate">{{ Str::limit($product->description, 20) }}</a>
                            <div class="mb-2 price">{{ $product->price }}-FCFA</div>
                            <!-- price.// -->
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="rounded btn btn-sm font-sm btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <a href="{{ route('admin.products.destroy', $product->id) }}" class="rounded btn btn-sm font-sm btn-light"> <i class="material-icons md-delete_forever"></i> Delete </a>
                        </div>
                    </div>
                    <!-- card-product  end// -->
                </div>
                @endforeach
                <!-- col.// -->

                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</section>
{{--
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products List</h2>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div>
            <a href="#" class="rounded btn btn-light font-md">Export</a>
            <a href="#" class="rounded btn btn-light font-md">Import</a>
            <a href="{{ route('admin.products.create') }}" class="rounded btn btn-primary btn-sm">Ajouter produit</a>
        </div>
    </div>
    <div class="mb-4 card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="flex-grow-0 col col-check">
                    <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" value="" />
                    </div>
                </div>
                <div class="mb-3 col-md-3 col-12 me-auto mb-md-0">
                    <select class="form-select">
                        <option selected>All category</option>
                        @foreach ($categories as $categorie )
                        <option>{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <input type="date" value="02.05.2021" class="form-control" />
                </div>
                <div class="col-md-2 col-6">
                    <select class="form-select">
                        <option selected>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            @foreach ($products as $product)
            <article class="itemlist">

                <div class="row align-items-center">
                    <div class="flex-grow-0 col col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="left">
                                <img src="{{ asset('admin/assets/imgs/items/1.jpg') }}" class="img-sm img-thumbnail" alt="Item" />
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{ Str::limit($product->description, 20) }}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price"><span>{{ $product->price }}</span></div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        <span class="badge rounded-pill alert-success">Active</span>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-date">
                        <span>02.11.2021</span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="rounded btn btn-sm font-sm btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                        <a href="{{ route('admin.products.destroy', $product->id) }}" class="rounded btn btn-sm font-sm btn-light"> <i class="material-icons md-delete_forever"></i> Delete </a>
                    </div>
                </div>
                <!-- row .// -->

            </article>
            @endforeach
            <!-- itemlist  .// -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</section> --}}
</main>

@endsection
