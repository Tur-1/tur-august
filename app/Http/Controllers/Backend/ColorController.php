<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Backend\StoreModelImageAction;
use Illuminate\Support\Str;
use App\Models\product\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreColorRequest;
use App\Traits\RedirectWithMessageTrait;
use App\Traits\FileUpload;

class ColorController extends Controller
{

    use RedirectWithMessageTrait, FileUpload;
    private $routeName = 'admin.colors.index';
    private $imageFolder = 'colors';

    public function index()
    {
        $colors = Color::select('id', 'name', 'image', 'slug')
            ->withCount('products')
            ->latest()
            ->paginate(12)
            ->withQueryString();


        return view('Backend.pages.colors.colors-page', compact('colors'));
    }


    private function saveColor($color, $request)
    {


        $color->name = Str::title($request->name);
        $color->slug = Str::slug($request->name);
        $color->image = (new StoreModelImageAction)->saveImage($request, $this->getColorOldImagePath($color), $this->imageFolder);
        $color->save();
    }

    private function getColorOldImagePath($color)
    {
        return $this->imageFolder . '/' . $color->image;
    }
    public function create()
    {
        return view('Backend.pages.colors.create-edit-color-page');
    }
    public function store(StoreColorRequest $request, Color $color)
    {

        $request->validated();
        $this->saveColor($color, $request);
        $message = $color->name . ' Color has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('Backend.pages.colors.create-edit-color-page', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColorRequest $request, Color $color)
    {

        $request->validated();
        $this->saveColor($color, $request);
        $message = $color->name . ' color has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {

        $message = $color->name . ' Color has been Deleted successfully';


        $this->destroyModelWithImage($color,  $this->getColorOldImagePath($color));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}
