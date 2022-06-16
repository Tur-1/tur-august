<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Models\product\ProductSizeOption;
use App\Services\Backend\Product\StoreProductService;
use App\Traits\AlertMessages;

class ProductController extends Controller
{
    use AlertMessages;
    private $routeName = 'admin.products.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.pages.products.products-page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brands = Brand::select('id', 'name', 'slug')->get();
        $colors = Color::select('id', 'name', 'slug')->get();

        return view('Backend.pages.products.create-edit-product-page', compact('brands', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

        (new StoreProductService)->saveProduct($product, $request);
        $message = $product->name . ' Product has been Added successfully';

        return $this->RedirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('productImages');
        $brands = Brand::select('id', 'name', 'slug')->get();
        $colors = Color::select('id', 'name', 'slug')->get();
        $productSizeOptions =   ProductSizeOption::where('product_id',  $product->id)->get();
        $productImages = $product->productImages;

        return view('Backend.pages.products.create-edit-product-page', compact('brands', 'colors', 'product', 'productSizeOptions', 'productImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        (new StoreProductService)->saveProduct($product, $request);
        $message = $product->name . ' Product has been updated successfully';

        return $this->RedirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}