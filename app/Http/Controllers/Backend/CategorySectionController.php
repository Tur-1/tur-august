<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreCategorySectionRequest;

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
    private function saveCategory($section, $request)
    {
        $section->name = Str::title($request['name']);
        $section->slug =  Str::slug($request['name'], '_');
        $section->meta_keywords = $request['meta_keywords'];
        $section->meta_title = $request['meta_title'];
        $section->meta_description = $request['meta_description'];
        $section->is_section = true;
        $section->image =  (new StoreModelImageAction)->saveImage($request, $this->getCategoryOldImagePath($section), $this->imageFolder);
        $section->save();
    }

    private function getCategoryOldImagePath($section)
    {
        return $this->imageFolder . '/' . $section->image;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorySectionRequest $request, Category $section)
    {

        $request->validated();
        $this->saveCategory($section, $request);
        $message = $section->name . ' section has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\Category  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Category $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\Category  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $section)
    {
        return view('Backend.pages.categories.create-edit-sections-page', ['category' => $section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\Category  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategorySectionRequest $request, Category $section)
    {

        $request->validated();
        $this->saveCategory($section, $request);
        $message = $section->name . ' section has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\Category  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $section)
    {

        $message = $section->name . ' Category has been Deleted successfully';

        $this->destroyModelWithImage($section,  $this->getCategoryOldImagePath($section));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}
