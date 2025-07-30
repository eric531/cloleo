@extends('admin.template')

@section('admin')
 


    <main class="main-wrap">
      @include('admin.header')
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Etiquettes</h2>
                    <p>Ajouter, éditer ou supprimer une etiquette</p>
                </div>
                <div>
                    <input type="text" placeholder="Search Categories" class="form-control bg-white" />
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
                            <form action="{{ route('etiquette.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Type here" class="form-control" id="product_name" />
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary">Ajouter une etiquette</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
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
                                           
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($etiquettes as $etiquette)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </td>
                                            <td>{{ $etiquette->id }}</td>
                                            <td><b>{{ $etiquette->name }}</b></td>
                                            
                                            
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">View detail</a>
                                                        <a class="dropdown-item" href="#">Edit info</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('etiquette.destroy', $etiquette) }}">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- dropdown //end -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
