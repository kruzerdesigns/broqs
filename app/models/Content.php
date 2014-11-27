<?php

class Content extends Eloquent{

    protected $fillable = array('con_id','nav', 'name','meta_title','meta_description','page_content','page_url');

    protected $table = 'content';

    public static $rules = array(
        'con_id'            => 'integer',
        'nav'               => 'min:2',
        'name'              => 'required|min:3'


    );



}