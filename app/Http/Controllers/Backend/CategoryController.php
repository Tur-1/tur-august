<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreCategoryRequest;

class CategoryController extends Controller
{
    use AlertMessages, FileUpload;
    private $routeName = 'admin.categories.index';
    private $imageFolder = 'categories';
    public function index()
    {

        return view('Backend.pages.categories.categories-page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.categories.create-edit-categories-page');
    }
    private function saveCategory($category, $request)
    {
        if (is_null($request['category_id']) || empty($request['category_id'])) {
            $parentId = $request['section_id'];
        } else {

            $parentId = $request['category_id'];
        }
        $parentCategory = app('allCategories')->where("id",  $parentId)->first();
        $ids = $parentCategory['parents_ids'] ?? [intval($parentId)];

        $ids[] = $parentCategory['id'];


        $categorySlug = $parentCategory['slug'];

        $category->parents_ids = array_unique($ids);
        $category->parent_id = $parentId;
        $category->name = Str::title($request['name']);
        $category->slug =  $categorySlug . '-' . Str::slug($request['name'], '_');
        $category->meta_keywords = $request['meta_keywords'];
        $category->meta_title = $request['meta_title'];
        $category->meta_description = $request['meta_description'];


        $category->image =  (new StoreModelImageAction)->saveImage($request, $this->getCategoryOldImagePath($category), $this->imageFolder);
        $category->save();
    }

    private function getCategoryOldImagePath($category)
    {
        return $this->imageFolder . '/' . $category->image;
    }
    public function store(StoreCategoryRequest $request, Category $category)
    {

        $request->validated();
        $this->saveCategory($category, $request);
        $message = $category->name . ' Category has been Added successfully';

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
        $section = app('allCategories')->whereIn("id", $category->parents_ids)->where("is_section", true)->first();

        $sectionChildren = [
            'selectedSection' => $section['id'],
            'sectionChildren' =>  $section['children'],
            'selectedCategory' => $category['parent_id']
        ];
        return view('Backend.pages.categories.create-edit-categories-page', compact('category', 'sectionChildren'));
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
        $message = $category->name . ' Category has been updated successfully';

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