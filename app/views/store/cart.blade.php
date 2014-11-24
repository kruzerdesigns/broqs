@extends('layout.main')

@section('content')

    <section class="row">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">

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
                            {{ HTML::image($product->image,$product->name,array('width'=>'40', 'height'=>'60')) }}
                            {{ $product->name }}
                        </td>
                        <td>&pound;{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            &pound;{{ $product->price }}
                            <a href="http://localhost/broq/public/store/removeitem/{{ $product->identifier }}">
                                {{ HTML::image('img/remove.gif','Remove Product') }}
                            </a>
                        </td>
                    </tr>

                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                             Total &pound;{{ Cart::total() }}

                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="currency_code" value="GBP">
                            <input type="hidden" name="business" value="yousuf@kruzerdesigns.com">
                            <input type="hidden" name="item_name" value="Store Purchase">
                            <input type="hidden" name="amount" value="{{ Cart::total() }}">
                            <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                            <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">


                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                             {{ HTML::link('http://localhost/broq/public','Continue Shopping',array('class'=>'button')) }}
                                                        <input type="submit" value="Checkout with paypal" class="button">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>

    </section>

@stop