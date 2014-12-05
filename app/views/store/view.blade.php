@extends('layout.main')

@section('content')

<section class="row">


        <!-- Product Image -->
        <div class="small-12 medium-6 large-4 columns padding-bottom">
            {{ HTML::image($product->image_1,$product->title) }}
        </div>
        <div class="small-12 medium-6 large-2 columns product-view">
            {{ HTML::image($product->image_2,$product->title) }}
            {{ HTML::image($product->image_3,$product->title) }}
            {{ HTML::image($product->image_4,$product->title) }}
        </div>

        <!-- Cart button and quantity -->
        <div class="large-6 columns end padding-bottom">
        <h1 class="padding-bottom">{{ $product->title }} - &pound;{{ $product->price }}</h1>

         {{ Form::open(array('url'=>'store/addtocart')) }}

            <div class="row">
              <div class="large-4">
                  <div class="large-6 columns">
                   {{ Form::label('quantity','Qty',array('class'=>'strong')) }}
                  </div>
                    <div class="large-6 columns end">

                     {{ Form::select('quantity', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),'1') }}
                     {{ Form::hidden('id', $product->id) }}
                    </div>
                </div>
              </div>

               <div class="row">
                <div class="large-6">
                    <div class="large-4 columns">
                     {{ Form::label('size','Size',array('class'=>'strong')) }}
                    </div>
                      <div class="large-6 columns end">

                       {{ Form::select('size', array('small'=>'Small','medium'=>'Medium','large'=>'Large'),'Small') }}
                       {{ Form::hidden('id', $product->id) }}
                      </div>
                  </div>
                </div>
               <div class="large-4">
                    <button type="submit" class="button tiny">ADD TO CART </button>
                </div>
          {{ Form::close() }}
         </div>

         <div class="large-6 columns padding-top">
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

             </div>


</section>

<section class="row padding">

    <h3> Related Products</h3>

    @foreach($related as $rel)
            <div class="large-3 columns product-related">
                    <div class="products">
                        <a href="http://localhost/broq/public/store/product/{{ $rel->url }}">
                            {{ HTML::image($rel->image_1,$rel->title, array('class'=>'feature','width'=>'240')) }}
                        </a>

                        <h5><a href="http://localhost/broq/public/store/product/{{ $rel->url }}">{{ $rel->title }} - {{ $rel->price }}</a></h5>

                            {{ Form::open(array('url'=>'store/addtocart')) }}
                                {{ Form::hidden('quantity',1) }}
                                {{ Form::hidden('id',$rel->id) }}

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