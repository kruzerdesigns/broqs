<?php

class Orders extends Eloquent{

    protected $fillable = array('basket_id');

    public static $rules = array('basket_id' => 'required');


}