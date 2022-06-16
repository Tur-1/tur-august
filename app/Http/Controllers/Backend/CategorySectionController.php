<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\AlertMessages;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreCategoryRequest;

class CategorySectionController extends Controller
{
    use AlertMessages, FileUpload;
    private $routeName = 'admin.categories.index';
    private $imageFolder = 'categories';
    public function index()
    {
        $categories = [];
        return view('Backend.pages.categories.categories-page', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.categories.create-edit-sections-page');
    }
    private function saveCategory($category, $request)
    {
        $category->name = Str::title($request['name']);
        $category->slug =  Str::slug($request['name'], '_');
        $category->meta_keywords = $request['meta_keywords'];
        $category->meta_title = $request['meta_title'];
        $category->meta_description = $request['meta_description'];
        $category->is_section = true;
        $category->image =  (new StoreModelImageAction)->saveImage($request, $this->getCategoryOldImagePath($category), $this->imageFolder);
        $category->save();
    }

    private function getCategoryOldImagePath($category)
    {
        return $this->imageFolder . '/' . $category->image;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {

        $request->validated();
        $this->saveCategory($category, $request);
        $message = $category->name . ' section has been Added successfully';

        return $this->RedirectWithSuccessMsg($this->routeName, $message);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {

        $request->validated();
        $this->saveCategory($category, $request);
        $message = $category->name . ' section has been updated successfully';

        return $this->RedirectWithSuccessMsg($this->routeName, $message);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}