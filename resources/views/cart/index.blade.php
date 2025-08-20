@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Available products</h1>
                @if ($viewData['products'])
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td></td>
                        </tr>
                        @foreach ($viewData['products'] as $key => $product)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ money($product['price']) }}</td>
                                <td><a href="{{ route('cart.add', ['id' => $key]) }}" class="btn btn-primary">Add to cart</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No products found.</p>
                @endif
            </div>
            <div class="col-md-6">
                <h1>Products in cart</h1>
                @if ($viewData['cartProducts'])
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                        </tr>
                        @foreach ($viewData['cartProducts'] as $key => $product)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ money($product['price']) }}</td>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{ route('cart.removeAll') }}" class="btn btn-danger">Remove all products from cart</a>
                @else
                    <p>Nothing yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
