@extends('layout.main')

@section('promo')

    <section class="row">
        Slider perhaps
    </section>

@stop

@section('content')

    <section class="row products-index">
        <h2>New Products</h2>

        @foreach($products as $product)
        <div class="large-3 columns">
                <div class="products">
                    <a href="http://localhost/broq/public/store/view/{{ $product->id }}">
                        {{ HTML::image($product->image,$product->title, array('class'=>'feature','width'=>'240')) }}
                    </a>

                    <h5><a href="http://localhost/broq/public/store/view/{{ $product->id }}">{{ $product->title }} - {{ $product->price }}</a></h5>

                        {{ Form::open(array('url'=>'store/addtocart')) }}
                            {{ Form::hidden('quantity',1) }}
                            {{ Form::hidden('id',$product->id) }}

                            <button type="submit" class="button tiny">
                                {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                                Add To Cart
                            </button>

                        {{ Form::close() }}

                </div>
            </div>

        @endforeach

    </section>

@stop