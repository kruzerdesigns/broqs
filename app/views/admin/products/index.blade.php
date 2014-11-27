@extends('layout.admin')

@section('content')

             @if($errors->has())
                <div class="alert-box alert" data-alert>
                    <p>Following errors have occurred</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="close">&times;</a>
                </div>
            @endif

            <div class="large-6 columns">
                <h1>View all products </h1>
                <p>Here you can view, delete, create new Products</p>
            </div>
            <div class="large-3 columns end">
                <a href="#" class="button small info" data-reveal-id="create">Create a product</a>
            </div>


            <hr>


        <div class="large-7">
             @foreach($products as $product)

                <div class="row">
                    <div class="large-2 columns">
                        {{ HTML::image($product->image, $product->title, array('width'=>'50')) }}
                    </div>

                    <div class="large-3 columns">
                        {{ $product->title }}
                    </div>

                    <div class="large-2 columns">
                        {{ HTML::link('admin/products/amend/'.$product->id,'Edit',array('class'=>'button tiny success')) }}
                    </div>

                    <div class="large-2 columns end">
                        {{ Form::open(array('url' =>'admin/destroyproducts' )) }}
                            {{ Form::hidden('id', $product->id) }}
                             <button class="button alert tiny " type="submit"><i class="fa fa-trash"></i></button>
                        {{ Form::close() }}
                    </div>
                </div>
                <br>

             @endforeach
        </div>


    </section>








        <div id="create" class="reveal-modal" data-reveal>
            <a class="close-reveal-modal">&#215;</a>
                <h2>Create a new product</h2>

                    {{ Form::open(array('url' => 'admin/createproducts', 'files'=>true)) }}

                                {{ Form::label('category_id', 'Category') }}
                                {{ Form::select('category_id',$categories) }}

                                {{ Form::label('title','Product Title',array('class'=>'strong')) }}
                                {{ Form::text('title') }}

                                {{ Form::label('description','Product Description',array('class'=>'strong')) }}
                                {{ Form::textarea('description') }}
                                <br>
                                {{ Form::label('price',null,array('class'=>'strong')) }}
                                {{ Form::text('price', null) }}

                                {{ Form::label('image', 'Choose an Image',array('class'=>'strong')) }}
                                {{ Form::file('image') }}


                            {{ Form::submit('Create Product', array('class'=>'button small info')) }}
                            {{ Form::close() }}


            </div>

@stop