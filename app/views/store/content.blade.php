@extends('layout.main')

@section('content')
<section class="row">

    <h2>{{ $content->name }}</h2>

    <p>
        {{ $content->page_content }}
    </p>
</section>


@stop