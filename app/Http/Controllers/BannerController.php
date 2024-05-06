<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // バリデーション
    $request->validate([
       'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
    // 画像をアップロードし、DBに保存する処理
    if ($request->hasFile('image')) {
        //$imagePath = $request->file('image')->store('banners', 'public');
        $imagePath = $request->file('image')->store('public/banners');

        
        // バナーモデルを作成し、画像パスを設定して保存
        $banner = new Banner();
        $banner->image = $imagePath;
        $banner->save();
    }

    // リダイレクトなどの適切な処理を行う
    //return redirect()->back()->with('success', 'バナーが登録されました');
    return redirect()->route('admin_top')->with('success', 'バナーが登録されました');
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
