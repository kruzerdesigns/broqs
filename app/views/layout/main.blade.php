<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eCommerce - Product</title>


   <!-- Stylesheets -->
   {{ HTML::style('css/normalize.css') }}
   {{ HTML::style('css/foundation.min.css') }}
   {{ HTML::style('css/style.css') }}
   {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}

</head>
<body>
    <main>
        <header>

            <section class="grey">

                <div class="row">
                    <div class="right">
                         @if(Auth::check())
                            <ul class="inline-list">
                                @if(Auth::user()->admin == 1)
                                    <li>{{ HTML::link('admin/categories','Categories') }}</li>
                                @endif
                                <li>
                                    <a href="">{{ HTML::link('users/account', Auth::user()->firstname) }}</a>
                                </li>
                                <li>{{ HTML::link('users/signout','Log Out') }}</li>

                            </ul>
                         @else
                            <ul class="inline-list">
                                <li>{{ HTML::link('users/signin','Sign In') }}</li>
                                <li>{{ HTML::link('users/newaccount','Register') }}</li>
                            </ul>
                         @endif
                     </div>

                </div>
            </section>

            <section class="contain-to-grid sticky">
                <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <section class="top-bar-section">
                    <!-- mobile view of nav -->
                    <ul class="title-area show-for-medium-down">
                        <li class="name">
                            <h1><a href="/">Brog</a></h1>
                        </li>

                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>

                    <!-- right of nav -->
                    <ul class="right">
                        <li class="has-form">
                            <div class="row collapse">
                                {{ Form::open(array('url' => 'store/search', 'method' => 'get')) }}

                                    <div class="large-8 small-9 columns">
                                        {{ Form::text('keyword', null, array('placeholder'=>'Search Products')) }}
                                    </div>

                                    <div class="large-4 small-3 columns">
                                        {{ Form::submit('Search', array('class'=>'button')) }}
                                    </div>

                                {{ Form::close() }}
                            </div>
                        </li>
                        <li><a href="<?=url()?>store/cart">Basket</a></li>
                    </ul>

                    <!-- Left of nav -->
                    <ul class="left">
                        <li><a href="{{ URL::to('/') }}">Broq</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                    </section>
                </nav>
            </section>
        </header>

        @yield('promo')
        @yield('search-keyword')

        @if (Session::has('message'))
            <p class="alert-box">{{ Session::get('message') }}</p>
        @endif

        @yield('content');

        <!--Footer -->
        <footer>

            <section class="row hidden-for-medium-down">

                <div class="large-4 columns">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                    </ul>
                </div><!-- end my-account -->

                <div class="large-4 columns">
                    <h4>INFORMATION</h4>
                    <ul>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div><!-- end info -->

                <div class="large-4 columns end">
                    <h4>EXTRAS</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div><!-- end extras -->

            </section><!-- end links -->



            <section class="row">



            </section>

        </footer>

    </main>

    {<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/foundation.reveal.js') }}
    {{ HTML::script('js/main.js') }}

</body>
</html>