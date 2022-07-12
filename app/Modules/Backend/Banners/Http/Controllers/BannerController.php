<?php

namespace App\Modules\Backend\Banners\Http\Controllers;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Models\Banner\Banner;
use App\Http\Controllers\Controller;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\Banners\Services\BannerService;
use App\Modules\Backend\Banners\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{

    use RedirectWithMessageTrait, FileUpload;
    private $routeName = 'admin.banners.index';
    private $bannerType = ['small', 'medium', 'large'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Banner::class, 'banner');
    }
    public function index()
    {
        $banners = Banner::paginate(12)->appends(request()->all());

        return view('Backend.pages.banners.banners-page', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.banners.create-edit-banner-page')->with(['bannerType' => $this->bannerType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request, Banner $banner)
    {
        $request->validated();

        (new BannerService())->saveBanner($banner, $request);

        $message = $banner->title . ' banner has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('Backend.pages.banners.create-edit-banner-page')->with(['bannerType' => $this->bannerType, 'banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBannerRequest $request, Banner $banner)
    {
        $request->validated();

        (new BannerService())->saveBanner($banner, $request);

        $message = $banner->title . ' banner has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $message = $banner->title . ' banner has been Deleted successfully';

        $this->destroyModelWithImage($banner, (new BannerService())->getBannerOldImagePath($banner));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}