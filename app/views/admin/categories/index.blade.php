@extends('layout.main')

@section('content')

    <section class="row">
        <h1>Categories Admin Panel</h1>

        <p>Here you can view, delete, create new categories</p>

        <h2>Categories</h2>

        <ul>
            @foreach($categories as $category)
                <li>
                    {{ $category->name }} -
                    {{ Form::open(array('url' =>'admin/categories/destroy' )) }}
                        {{ Form::hidden('id', $category->id) }}
                        {{ Form::submit('Delete') }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
    </section>

    <section class="row">
        <h2>Create new category</h2>

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

        {{ Form::open(array('url' => 'admin/categories/create')) }}
            {{ Form::label('name') }}
            {{ Form::text('name') }}

            {{ Form::submit('Create Category', array('class'=>'button')) }}
        {{ Form::close() }}


    </section>

@stop