<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Services\Backend\Category\StoreCategoryService;

class CategoryController extends Controller
{
    use AlertMessages, FileUpload;
    private $routeName = 'admin.categories.index';

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



    public function store(StoreCategoryRequest $request, Category $category)
    {

        $request->validated();
        (new StoreCategoryService())->saveCategory($category, $request);
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
        (new StoreCategoryService())->saveCategory($category, $request);
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

        $message = $category->name . ' Category has been Deleted successfully';

        $this->destroyModelWithImage($category, (new StoreCategoryService())->getCategoryOldImagePath($category));
        return $this->RedirectWithSuccessMsg($this->routeName, $message);
    }
}