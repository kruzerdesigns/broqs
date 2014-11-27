@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="large-6 columns">
            <h1>Amend <span class="soft-blue">{{ $products->title }}</span> </h1>
        </div>
        <div class="large-4 columns end">
            {{ HTML::link('admin/content','Back to all products') }}
        </div>
    </div>


        {{ Form::open(array('url'=>'admin/amendcontent')) }}

            {{ Form::label('name','Product Name',array('class'=>'strong')) }}
            <div class="row">

                <div class="large-4 columns">
                    {{ Form::text('name',$products->title,array('class'=>'large-6')) }}
                </div>

                <div class="large-2 columns ">
                    @if($products->availability == 1)
                        <?php $class = 'soft-green'; ?>
                    @elseif($products->availability == 0)
                         <?php $class = 'soft-red-bg'; ?>
                    @endif
                    {{ Form::select('availability', array('1' => 'In Stock', '0' => 'Out of Stock'), $products->availability,array('class'=>$class)) }}
                </div>

                <div class="large-3 columns end">

                    @if($products->small == 1)
                        <?php $checkeds = 'true' ?>
                    @else
                        <?php $checkeds = '' ?>
                    @endif
                    @if($products->medium == 1)
                        <?php $checkedm = 'true' ?>
                    @else
                        <?php $checkedm = '' ?>
                    @endif
                    @if($products->large == 1)
                        <?php $checkedl = 'true' ?>
                    @else
                        <?php $checkedl = '' ?>
                    @endif


                    {{ Form::checkbox('small','1',$checkeds) }}
                    {{ Form::label('small','S',array('class'=>'strong')) }}
                    {{ Form::checkbox('medium','1',$checkedm) }}
                    {{ Form::label('medium','L',array('class'=>'strong')) }}
                    {{ Form::checkbox('large','1',$checkedl) }}
                    {{ Form::label('large','M',array('class'=>'strong')) }}


                </div>
            </div>

            {{ Form::label('meta_title','Meta Title - Used for SEO purposes. the title of the the page',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-4 column">
                    {{ Form::text('meta_title',$products->meta_title) }}
                </div>
            </div>

            {{ Form::label('meta_description','Meta Description - Used for SEO purposes - Description of the the page',array('class'=>'strong')) }}
            <div class="row">
                <div class="large-10 column">
                    {{ Form::text('meta_description',$products->meta_description) }}
                </div>
            </div>


            {{ Form::label('description','Product Description',array('class'=>'strong','id'=>'wysiwyg')) }}
            {{ Form::textarea('page_content',$products->description,array('id','wysiwyg')) }}

            <div class="row">
                @if($products->image)
                    <div class="large-2 columns">
                        <div class="grey">
                             {{ HTML::image($products->image, $products->title) }}
                        </div>
                        {{ Form::label('image', 'Change Image',array('class'=>'strong')) }}
                        {{ Form::file('image') }}
                    </div>
                @endif

            </div>


            <br>
            {{ Form::hidden('id',$products->id) }}
            {{ Form::submit('Update',array('class'=>'success button small')) }}

        {{ Form::close() }}



@stop