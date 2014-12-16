<?php

class Album extends Eloquent{


    protected $fillable = array('title','description','image');

    public static $rules = array('title' => 'required');


}