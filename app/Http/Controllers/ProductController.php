<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller {

    public function __construct(){
        
        // $this->middleware('rolecheck')->only(['create', 'store', 'edit', 'destroy']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $data = [];

        if(isset($request->cat)){
            $cat_id = $request->cat;
            $cat = Category::find($cat_id);
            $data['records'] = $cat->products;
        }else{
            $data['records'] = Product::all();
        }
        
        return View::make('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = [];

        foreach (Category::all() as $key => $value) {
            $categories[$value["id"]] = $value["name"];
        }
        return View::make('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'sku' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);        

        $model = new Product;
        $product = $model->create($request->all());

        foreach ($request->category as $value) {
            DB::table('category_product')->insert(
                ['product_id' => $product->id, 'category_id' => $value]
            );
        }

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $result =  Product::find($id)->delete();
        return response()->json([
            'result' => $result
        ]);
    }
}
