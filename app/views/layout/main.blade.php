<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

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
                    <ul class="right inline-list">
                        <li>Sign in</li>
                    </ul>
                </div>
            </section>

            <section class="top-header">
                <!-- insert broq header image -->

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
                                <form action="#" method="get">

                                    <div class="large-8 small-9 columns">
                                        <input type="text" placeholder="Search Products">
                                    </div>

                                    <div class="large-4 small-3 columns">
                                        <input type="submit" class="button" value="Search">
                                    </div>

                                </form>
                            </div>
                        </li>
                        <li>Basket (0) items</li>
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

        @if (Session::has('message'))
            <p class="alert-box">{{ Session::get('message') }}</p>
        @endif

        @yield('content');

        <!--Footer -->
        <footer>

            <section class="row hidden-for-medium-down">

                <div class="large-4 columns">
                    <h4>MY ACCOUNT</h4>
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

                <div class="large-4 columns">
                    <div id="logo">
                        <a href="#"><span id="logo-accent">e</span>Commerce</a>
                    </div>
                    <p id="store-desc">Broq clothing store</p>
                    <p id="store-copy">&copy; 2014</p>
                </div>

                <div class="large-4 columns">
                    <h4>CONNECT WITH US</h4>
                    <ul>
                        <li class="twitter"><a href="#">Twitter</a></li>
                        <li class="fb"><a href="#">Facebook</a></li>
                    </ul>
                </div>

                <div class="large-4 columns">
                    <h4>SUPPORTED PAYMENT METHODS</h4>
                    {{ HTML::image('img/payment-methods.gif','Payment Method') }}
                </div>

            </section>

        </footer>

    </main>

    {<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/main.js') }}

</body>
</html>