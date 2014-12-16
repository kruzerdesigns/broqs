<?php

class Image extends Eloquent{


    protected $fillable = array('image','description','description_2','album_id');

    public static $rules = array('product_id' => 'numeric');


}