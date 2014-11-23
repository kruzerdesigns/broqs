@extends('layout.main')

@section('content')

<section class="row">

        <h1>{{ $product->title }}</h1>
        <!-- Product Image -->
        <div class="small-12 medium-6 large-8 columns">
            {{ HTML::image($product->image,$product->title) }}
        </div>

        <!-- Cart button and quantity -->
        <div class="small-12 medium-6 large-4 columns end">
            <p> {{ $product->price }}</p>
            <form action="#" method="post">
                <label for="qty">Qty:</label>
                <input type="text" id="qty" name="qty" value="1" maxlength="2">

                <button type="submit" class="button">
                    {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                    ADD TO CART
                </button>
            </form>
        </div>
</section>

<section class="row">
        <!--Product Discription -->

        <dl class="tabs" data-tab>
            <dd class="active"><a href="#panel1">Description</a></dd>
            <dd><a href="#panel2">Tab 2</a></dd>
            <dd><a href="#panel3">Tab 3</a></dd>
            <dd><a href="#panel4">Tab 4</a></dd>
        </dl>

        <div class="tabs-content">
            <div class="content active" id="panel1">
                <p>{{ $product->description }}</p>
            </div>

            <div class="content" id="panel2">
                <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
            </div>

            <div class="content" id="panel3">
                <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
            </div>

            <div class="content" id="panel4">
                <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
            </div>
        </div>

    </section>

@stop