@extends('layout.main')

@section('promo')

    <section class="row padding">
        <div class="large-8 large-centered columns">
            <div class="slider">
                {{ HTML::image('img/slider.jpg','Slider') }}
            </div>
        </div>

    </section>

@stop

@section('content')

    <section class="row">
        <div class="medium-6 columns">
        <p>The Wikipedia Proposition is a declaration of intent by the house of etti on behalf of thebr.o.q to here now
         pledge to provide to the Wikimedia Foundation a contribution of a pound for every item of aparrel sold for gain
          in the transactional currency. Before the reader should let cynicism set in consider first that... </p>
        </div>

        <div class="medium-6 columns">
        <p>
            Kitti Kalla design draws premise from a thing we like to call The BEAU in Design. The artisan rather than
            segregate the multitude of pursuits driving an endeavour unifies them for the revelation of its beauty in
            utility. A method specific to the type of craftsman concerned to the upmost for the utility of his work
            convincingly finding harmony with her aesthetic bias.
        </p>
        </div>


    </section>
    <section class="row products-index">
        <h2>New Products</h2>

        @foreach($products as $product)
        <div class="large-3 columns">
                <div class="products">
                    <a href="http://localhost/broq/public/store/product/{{ $product->url }}">
                        {{ HTML::image($product->image_1,$product->title, array('class'=>'feature','width'=>'240')) }}
                    </a>

                    <h5><a href="http://localhost/broq/public/store/product/{{ $product->url }}">{{ $product->title }} - {{ $product->price }}</a></h5>

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