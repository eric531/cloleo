<section class="product-details spad">
    <div class="container">
        <div class="row">
            <!-- Images du produit -->
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{ asset('assets/imgs/banner/banner-11.png') }}" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>

            <!-- Informations du produit -->
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->name }}</h3>
                    <div class="product__details__text">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $averageRating)
                                <i class="fa fa-star"></i>
                            @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                <i class="fa fa-star-half-o"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                            @endif
                        @endfor
                        <span>({{ $reviews->count() }} avis)</span>
                    </div>
                    <div class="product__details__price">{{ $product->price }} €</div>
                    <p>{{ $product->description }}</p>

                    <div class="product__details__quantity">
                        <form action="" method="POST">
                            @csrf
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" value="1" min="1">
                                </div>
                            </div>
                            <button type="submit" class="primary-btn">Ajouter au panier 🛒</button>
                        </form>
                    </div>

                    <form action="{{ route('favorites.toggle', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="heart-icon">
                            @if($isFavorite)
                                ❤️ Retirer des favoris
                            @else
                                🤍 Ajouter aux favoris
                            @endif
                        </button>
                    </form>

                    <ul>
                        <li><b>Disponibilité</b> <span>{{ $product->stock > 0 ? 'En stock' : 'Rupture de stock' }}</span></li>
                        <li><b>Livraison</b> <span>1 jour ouvré. <samp>Retrait gratuit aujourd’hui</samp></span></li>
                        <li><b>Poids</b> <span>0.5 kg</span></li>
                        <li><b>Partager</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Onglets Description / Infos / Avis -->
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Avis <span>({{ $reviews->count() }})</span></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p>Aucune information supplémentaire.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                @foreach($reviews as $review)
                                    <div class="review">
                                        <strong>{{ $review->user->name }}</strong> - {{ $review->rating }} ⭐
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                @endforeach

                                @auth
                                    <h3>Laisser un avis</h3>
                                    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                                        @csrf
                                        <label>Note :</label>
                                        <select name="rating" required>
                                            @for($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}">{{ $i }} ⭐</option>
                                            @endfor
                                        </select>

                                        <label>Commentaire :</label>
                                        <textarea name="comment" required></textarea>

                                        <button type="submit">Envoyer</button>
                                    </form>
                                @else
                                    <p><a href="">Connectez-vous</a> pour laisser un avis.</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>


