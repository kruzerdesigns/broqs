<?php
class AlbumController extends BaseController{

    /********************
     ** Colour Gallery **
     *******************/

    public function getIndex(){

        return View::make('admin/gallery.colour');
    }

    public function postNewcolour(){



    }

}