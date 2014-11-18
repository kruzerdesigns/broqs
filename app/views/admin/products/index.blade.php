@extends('layout.main')

@section('content')

    <section class="row">
        <h1>Products Admin Panel</h1>

        <p>Here you can view, delete, create new Products</p>

        <h2>Products</h2>

        <ul>
            @foreach($products as $product)
                <li>
                    {{ HTML::image($product->image, $product->title, array('width'=>'50')) }}
                    {{ $product->title }} -
                    {{ Form::open(array('url' =>'admin/products/destroy' )) }}
                        {{ Form::hidden('id', $product->id) }}
                        {{ Form::submit('Delete') }}
                    {{ Form::close() }} -

                    {{ Form::open(array('url' =>'admin/products/toggle-availability')) }}
                        {{ Form::hidden('id',$product->id) }}
                        {{ Form::select('availability', array('1' => 'In Stock', '0' => 'Out of Stock'), $product->availability) }}
                        {{ Form::submit('Update', array('class' => 'button')) }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
    </section>

    <section class="row">
        <h2>Create new Products</h2>

        @if($errors->has())
            <div class="alert-box" data-alert>
                <p>Following errors have occurred</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <a href="#" class="close">&times;</a>
            </div>
        @endif

        {{ Form::open(array('url' => 'admin/products/create', 'files'=>true)) }}
        <p>
            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id',$categories) }}
        </p>
        <p>
            {{ Form::label('title') }}
            {{ Form::text('title') }}
        </p>
        <p>
            {{ Form::label('description') }}
            {{ Form::textarea('description') }}
        </p>
        <p>
            {{ Form::label('price') }}
            {{ Form::text('price', null) }}
        </p>
        <p>
            {{ Form::label('image', 'Choose an Image') }}
            {{ Form::file('image') }}
        </p>

        {{ Form::submit('Create Product', array('class'=>'button')) }}
        {{ Form::close() }}


    </section>

@stop