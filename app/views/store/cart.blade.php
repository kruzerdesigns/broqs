@extends('layout.main')

@section('content')

    @if($products)

    <section class="row">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">

            <div class="small-12 medium-7 columns">

                <table role="grid">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)

                        <tr>
                            <td>
                                {{ HTML::image($product->image_1,$product->title,array('class'=>'product-cart')) }}
                                {{ HTML::link('/store/product/'.$product->url, $product->title) }}
                                <a href="http://localhost/broq/public/store/removeitem/{{ $product->bas_id }}">
                                    {{ HTML::image('img/remove.gif','Remove Product') }}
                                </a>
                            </td>
                            <td>&pound;{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                &pound;{{ $product->total_price }}

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="small-12 medium-5 columns">
                <div class="payment">
                    <div class="payment-price">
                          Total &pound;{{ $total }}
                    </div>
                    <div class="payment-checkout">
                        {{ HTML::link(url(),'Continue Shopping',array('class'=>'button small soft-blue-bg')) }}

                         <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="currency_code" value="GBP">
                        <input type="hidden" name="business" value="yousuf@kruzerdesigns.com">
                        <input type="hidden" name="item_name" value="Store Purchase">
                        <input type="hidden" name="amount" value="{{ Cart::total() }}">
                        <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                        <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                       <input type="submit" value="Checkout with paypal" class="button small info">
                    </div>
                </div>
            </div>
        </form>

    </section>

    @else

    <section class="row">
        <h4>Your basket is currently empty</h4>
    </section>

    @endif
@stop