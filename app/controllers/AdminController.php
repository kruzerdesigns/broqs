<?php

class AdminController extends BaseController{

    public function __construct(){
        $this->beforeFilter('csrf,', array('on' => 'post'));
        $this->beforeFilter('admin');

    }

    public function getIndex(){
        return View::make('admin/index')
            ->with('categories',Category::all());
    }

    /****************
    ** Categories **
    ****************/
    public function getCategories(){
        return View::make('admin/categories.index')
            ->with('categories',Category::all());
    }

    public function postCreatecategories(){
        $validator = Validator::make(Input::all(),Category::$rules);

        if($validator->passes()){
            $category       = new Category;
            $category->name = ucfirst(Input::get('name'));
            $category->save();

            return Redirect::to('admin/categories')
                ->with('success','Category Created');
        }

        return Redirect::to('admin/categories/index')
            ->with('error', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();

    }

    public function postAmendcategory(){

        $validator = Category::find(Input::get('id'));

        if($validator){

            $validator->name  = ucfirst(Input::get('name'));
            $validator->save();


            return Redirect::to('admin/categories')
                ->with('success','Category name amended');
        }

        return Redirect::to('admin/categories')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);

    }

    public function postDestroycategories(){
        $category = Category::find(Input::get('id'));

        if($category){
            $category->delete();
            return Redirect::to('admin/categories')
                ->with('success', 'Category Deleted');
        }

        return Redirect::to('admin/categories')
            ->with('error', 'Something went wrong, please try again');
    }


    /****************
     *** Products ***
     ****************/
    public function getProducts(){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

        return View::make('admin/products.index')
            ->with('products',Product::all())
            ->with('categories',$categories);
    }

    public function getProductstamend($id){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return View::make('admin/products.amend')
            ->with('products',Product::where('id','=',$id)->first())
            ->with('categories',$categories);
    }

    public function postCreateproducts(){
        $validator = Validator::make(Input::all(),Product::$rules);

        if($validator->passes()){
            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');

            $image = Input::file('image');
            $filename = time()."-".$image->getclientOriginalName();
            Image::make($image->getRealPath())->save('img/products/'.$filename);
            $product->image = 'img/products/'.$filename;


            $product->save();

            return Redirect::to('admin/products')
                ->with('success','Product Created');
        }

        return Redirect::to('admin/products/index')
            ->with('error', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();

    }

    public function postDestroyproducts(){
        $product = Product::find(Input::get('id'));

        if($product){
            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                ->with('success', 'Products Deleted');
        }

        return Redirect::to('admin/products/index')
            ->with('error', 'Something went wrong, please try again');
    }

    public function postToggleAvailability() {
        $product = Product::find(Input::get('id'));

        if($product){
            $product->availability = Input::get('availability');
            $product->save();

            return Redirect::to('admin/products/index')
                ->with('success', 'Product updated');
        }

        return Redirect::to('admin/products/index')
            ->with('error','Invalid Product');
    }



    /****************
     ** Content *****
     ****************/

    public function getContent(){
        return View::make('admin/content.index')
            ->with('content',Content::where('nav','=','0')->get());
    }

    public function getContentammend($url){
        return View::make('admin/content.ammend')
            ->with('content',Content::where('url','=',$url)->first());
    }

    public function postCreatecontent(){

        $validator = Validator::make(Input::all(),Content::$rules);

        if($validator->passes()){
            $url              = Input::get('name');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $content                    = new Content();
            $content->name              = ucfirst(Input::get('name'));
            $content->url               = $url;
            $content->nav               = 0;
            $content->save();




            return Redirect::to('admin/content')
                ->with('success','New page content');
        }

        return Redirect::to('admin/content')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);


    }

    public function postAmendcontent(){

        $validator = Content::find(Input::get('id'));

        if($validator){

            $url              = Input::get('name');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $validator->name              = ucfirst(Input::get('name'));
            $validator->meta_title        = Input::get('meta_title');
            $validator->meta_description  = Input::get('meta_description');
            $validator->page_content      = Input::get('page_content');
            $validator->url               = $url;

            $validator->save();


            return Redirect::to('admin/contentamend/'.$url)
                ->with('success','Page successfully updated');
        }

        return Redirect::to('admin/content')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);

    }

    public function postDestroycontent(){
        $validator = Content::find(Input::get('id'));

        if($validator){

            $validator->delete();

            return Redirect::to('admin/content')
                ->with('success','Link Deleted');
        }

        return Redirect::to('admin/content')
            ->with('error', 'Something went wrong');
    }


    /********************
     ** Navigation *****
     *******************/

    public function getNavigation(){
        return View::make('admin/content.navigation')
            ->with('content',Content::all());
    }

    public function postCreatenavigation(){

        $validator = Validator::make(Input::all(),Content::$rules);

        if($validator->passes()){
            $content        = new Content();
            $content->name  = Input::get('name');
            $content->nav   = 1;
            $content->save();


            return Redirect::to('admin/navigation')
                ->with('success','Link Created');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);


    }

    public function postAmendnavigation(){

        $navigation = Content::find(Input::get('id'));

        if($navigation){

            $navigation->name  = Input::get('name');
            $navigation->save();


            return Redirect::to('admin/navigation')
                ->with('success','Link Created');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong')
            ->withErrors($navigation);

    }

    public function postDestroynavigation(){
        $navigation = Content::find(Input::get('id'));

        if($navigation){

            $navigation->delete();

            return Redirect::to('admin/navigation')
                ->with('success','Link Deleted');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong');
    }
}