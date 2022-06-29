<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\product\Brand;
use App\Traits\RedirectWithMessageTrait;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreBrandRequest;

class BrandController extends Controller
{
    use RedirectWithMessageTrait, FileUpload;
    private $routeName = 'admin.brands.index';
    private $imageFolder = 'brands';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::select('id', 'name', 'image', 'slug')
            ->withCount('products')
            ->latest()
            ->paginate(12)
            ->withQueryString();


        return view('Backend.pages.brands.brands-page', compact('brands'));
    }

    private function saveBrand($brand, $request)
    {

        $brand->name = Str::title($request->name);
        $brand->slug = Str::slug($request->name);
        $brand->image = (new StoreModelImageAction)->saveImage($request, $this->getBrandOldImagePath($brand), $this->imageFolder);
        $brand->save();
    }

    private function getBrandOldImagePath($brand)
    {
        return $this->imageFolder . '/' . $brand->image;
    }
    public function create()
    {
        return view('Backend.pages.brands.create-edit-brand-page');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request, Brand $brand)
    {

        $request->validated();
        $this->saveBrand($brand, $request);
        $message = $brand->name . ' Brand has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('Backend.pages.brands.create-edit-brand-page', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandRequest $request, Brand $brand)
    {

        $request->validated();
        $this->saveBrand($brand, $request);
        $message = $brand->name . ' brand has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {

        $message = $brand->name . ' Brand has been Deleted successfully';

        $this->destroyModelWithImage($brand,  $this->getBrandOldImagePath($brand));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}