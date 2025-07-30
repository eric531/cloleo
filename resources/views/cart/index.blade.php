@extends('base.template')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="mr-5 fi-rs-home"></i>Home</a>
            <span></span> Shop
            <span></span> Cart
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mb-40 col-lg-8">
            <h1 class="mb-10 heading-2">Votre panier</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">Il y a <span class="text-brand">{{ count($cart) }}</span> produits dans votre panier</h6>
                <h6 class="text-body"><a href="{{ route('cart.clear') }}" class="text-muted"><i class="mr-5 fi-rs-trash"></i>Clear Cart</a></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cart)
                            @foreach($cart as $product)
                            <tr data-product-id="{{ $product['id'] }}">
                                <td class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox{{ $product['id'] }}" value="">
                                    <label class="form-check-label" for="exampleCheckbox{{ $product['id'] }}"></label>
                                </td>
                                <td class="image product-thumbnail pt-50">
                                    <a href="{{ route('product.show', $product['id']) }}"><img src="{{ asset($product['image']) }}" alt="product" /></a>
                                </td>
                                <td class="product-title">{{ $product['name'] }}</td>
                                <td class="product-price"><span class="price" data-price="{{ $product['price'] }}">{{ $product['price'] }}</span></td>
                                <td class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="number" name="quantity" min="1" value="{{ $product['quantity'] }}" data-product-id="{{ $product['id'] }}" />
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="price">{{ number_format($product['price'] * $product['quantity'], 2, ',', ' ') }}</span>
                                </td>
                                <td class="end">
                                    <a href="{{ route('cart.remove', $product['id']) }}" class="text-muted"><i class="mr-10 fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7" class="text-center">Aucun produit dans le panier</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" href="{{ route('products.index') }}"><i class="mr-10 fi-rs-arrow-left"></i>Continue Shopping</a>
                </div>
            </div>
            @php
            $subtotal = 0;
            if ($cart) {
                foreach ($cart as $product) {
                    $subtotal += $product['price'] * $product['quantity'];
                }
            }
            @endphp
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="cart-subtotal">{{ number_format($subtotal, 2, ',', ' ') }} XOF</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="mt-10 mb-10 divider-2"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">Free</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Estimate for</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">United Kingdom</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="mt-10 mb-10 divider-2"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="cart-total">{{ number_format($subtotal, 2, ',', ' ') }} XOF</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn" href="{{ route('checkout.detail') }}"><i class="mr-10 fi-rs-arrow-left"></i>Continue Shopping</a>
                    </div>
                    {{-- <form action="{{ route('checkout.store') }}" method="POST">

                        <button type="submit" class="mb-20 btn w-100">Proceed To CheckOut <i class="fi-rs-sign-out ml-15"></i></button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.cart-plus-minus-box');

        quantityInputs.forEach(input => {
            input.addEventListener('change', function () {
                const quantity = parseInt(this.value) || 1; // Ensure quantity is at least 1
                const productId = this.getAttribute('data-product-id');
                const productRow = this.closest('tr');
                const priceElement = productRow.querySelector('.product-price .price');
                const unitPrice = parseFloat(priceElement.getAttribute('data-price'));
                const subtotalElement = productRow.querySelector('.product-subtotal .price');

                // Update product subtotal
                const subtotal = unitPrice * quantity;
                subtotalElement.textContent = subtotal.toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                // Update cart totals
                updateCartTotals();

                // Send updated quantity to server
                updateCartOnServer(productId, quantity);
            });
        });

        function updateCartTotals() {
            let total = 0;
            document.querySelectorAll('.product-subtotal .price').forEach(subtotal => {
                const value = parseFloat(subtotal.textContent.replace(',', '.').replace(/\s/g, '')) || 0;
                total += value;
            });

            const formattedTotal = total.toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' XOF';
            document.getElementById('cart-subtotal').textContent = formattedTotal;
            document.getElementById('cart-total').textContent = formattedTotal;
        }

        function updateCartOnServer(productId, quantity) {
            console.log(`Updating cart: product_id=${productId}, quantity=${quantity}`);
            fetch('{{ route("checkout.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (!data.success) {
                    console.error('Failed to update cart:', data.message);
                    alert(data.message || 'Erreur lors de la mise à jour du panier');
                } else {
                    console.log('Cart updated successfully');
                }
            })
            .catch(error => {
                console.error('Error updating cart:', error);
                alert('Une erreur est survenue lors de la mise à jour du panier');
            });
        }
    });
    </script>
@endsection

