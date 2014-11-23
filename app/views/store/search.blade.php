@extends('layout.main')

@section('search-keyword')

    <section class="row">
        <header><h1>Search Results for <span class="red">{{ $keyword }}</span> </h1></header>

    </section>

@stop

@section('content')

    <section class="row">

        @foreach($products as $product)

            <div class="products">
                <a href="http://localhost/broq/public/store/view/{{ $product->id }}">
                    {{ HTML::image($product->image,$product->title, array('class'=>'feature','width'=>'240')) }}
                </a>

                <h3><a href="http://localhost/broq/public/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

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