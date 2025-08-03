@extends('admin.template')

@section('admin')



    <main class="main-wrap">
      @include('admin.header')
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Categories</h2>
                    <p>Modifier une categorie</p>
                </div>
                <div>
                    <input type="text" placeholder="Search Categories" class="bg-white form-control" />
                </div>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
           @endif

           @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
           @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                               @METHODE('PUT')
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Type here" value="{{ $category->name }}" class="form-control" id="product_name" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea placeholder="Type here"name="description" value="{{ $category->description }}" class="form-control"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary">Creer une catégorie</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>

                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $categorie)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </td>
                                            <td>21</td>
                                            <td><b>{{ $categorie->name }}</b></td>
                                            <td>{{ (Str::limit($categorie->description,20)) }}</td>

                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="#" data-bs-toggle="dropdown" class="rounded btn btn-light btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">View detail</a>
                                                        <a class="dropdown-item" href="#">Edit info</a>
                                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        <!-- .col// -->
                    </div>
                    <!-- .row // -->
                </div>
                <!-- card body .// -->
            </div>
            <!-- card .// -->
        </section>
        <!-- content-main end// -->
        @include('admin.footer')
    </main>
@endsection
