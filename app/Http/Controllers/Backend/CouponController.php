<?php

namespace App\Http\Controllers\Backend;

use App\Models\order\Coupon;
use Illuminate\Http\Request;
use App\Traits\RedirectWithMessageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCouponRequest;

class CouponController extends Controller
{
    use RedirectWithMessageTrait;
    private $routeName = 'admin.coupons.index';
    private $couponTypes = ['percentage', 'Fixed'];


    public function index()
    {
        $coupons = Coupon::get();

        return view('Backend.pages.coupons.coupons-page', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.coupons.create-edit-coupons-page', ['couponTypes' => $this->couponTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request, Coupon $coupon)
    {

        $couponRequest = $request->validated();

        $coupon = $coupon->create($couponRequest);

        $message = $coupon->code . 'coupon has been added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {

        return view('Backend.pages.coupons.create-edit-coupons-page', ['coupon' => $coupon, 'couponTypes' => $this->couponTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCouponRequest $request, Coupon $coupon)
    {

        $couponRequest = $request->validated();

        $coupon->update($couponRequest);

        $message = $coupon->code . 'coupon has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {

        $message = $coupon->code . ' has been Deleted successfully';

        $coupon->delete();
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}
