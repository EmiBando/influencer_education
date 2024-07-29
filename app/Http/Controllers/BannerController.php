<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.admin_banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $imagePath = $file->store('public/banners');
                    
                    $banner = new Banner();
                    $banner->image = $imagePath;
                    $banner->save();
                }
            }

            DB::commit();

            return redirect()->route('admin_top')->with('success', 'バナーが登録されました');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin_top')->with('error', 'バナーの登録中にエラーが発生しました: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $banner = Banner::findOrFail($id);
            
            if (Storage::exists($banner->image)) {
                Storage::delete($banner->image);
            }
            
            $banner->delete();

            DB::commit();

            return redirect()->route('admin_banner')->with('success', 'バナーが削除されました');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin_banner')->with('error', 'バナーの削除中にエラーが発生しました: ' . $e->getMessage());
        }
    }
}
