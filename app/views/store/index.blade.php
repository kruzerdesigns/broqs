@extends('layout.main')

@section('promo')

    <section class="row">
        <h1>Todays Deals</h1>
        <p>Checkout this section discounted products</p>

        <a href="#">Shop Now</a>
        {{ HTML::image('img/promo.png','Promotional stuff') }}
    </section>

@stop

@section('content')

    <section class="row">
        <h2>New Products</h2>

        @foreach($products as $product)

            <div class="products">
                <a href="http://localhost/broq/public/store/view/{{ $product->id }}">
                    {{ HTML::image($product->image,$product->title, array('class'=>'feature','width'=>'240')) }}
                </a>

                <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

                <p>{{ $product->description }}</p>

                <p>
                    <a href="" class="button">
                        {{ $product->price }}
                        {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                        Add to cart
                    </a>
                </p>
            </div>

        @endforeach

    </section>

@stop