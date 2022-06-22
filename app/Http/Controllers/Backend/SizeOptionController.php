<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\AlertMessages;
use App\Models\product\SizeOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreSizeOptionRequest;

class SizeOptionController extends Controller
{

    use AlertMessages;

    private $RouteName = 'admin.sizeOptions.index';

    public function index()
    {

        $sizeOptions = SizeOption::orderBy('name', 'desc')->paginate(12);
        return view('Backend.pages.size-options.size-options-page', compact('sizeOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.size-options.create-edit-size-options-page');
    }

    private function saveSizeOption($sizeOption, $request)
    {
        $sizeOption->name = Str::upper($request->name);
        $sizeOption->slug =  str::slug($request->name);
        $sizeOption->save();
    }
    public function store(StoreSizeOptionRequest $request, SizeOption $sizeOption)
    {

        $request->validated();
        $this->saveSizeOption($sizeOption, $request);
        $message = $sizeOption->name . ' size has been Added successfully';

        return $this->redirectWithSuccessMsg($this->RouteName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\SizeOption  $sizeOption
     * @return \Illuminate\Http\Response
     */
    public function show(SizeOption $sizeOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\SizeOption  $sizeOption
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeOption $sizeOption)
    {
        return view('Backend.pages.size-options.create-edit-size-options-page', compact('sizeOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\SizeOption  $sizeOption
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSizeOptionRequest $request, SizeOption $sizeOption)
    {
        $request->validated();

        $this->saveSizeOption($sizeOption, $request);
        $message = $sizeOption->name . ' size has been Updated successfully';

        return $this->redirectBackWithSuccessMsg($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\SizeOption  $sizeOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeOption $sizeOption)
    {

        $sizeOption->delete();
        $message = $sizeOption->name . ' size has been Deleted successfully';

        return $this->redirectWithSuccessMsg($this->RouteName, $message);
    }
}
