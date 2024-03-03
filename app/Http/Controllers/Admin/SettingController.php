<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    public function store(Request $request)
    {
        if($request->title){
            setting(['title' => $request->title])->save();
        }

        if ($request->file('img_favicon')){
            if(!empty(setting('img_favicon'))){
                File::delete(public_path(setting('img_favicon')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 300;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img_favicon');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['img_favicon' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('img_logo')){
            if(!empty(setting('img_logo'))){
                File::delete(public_path(setting('img_logo')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 300;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img_logo');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['img_logo' => 'uploads/setting/'.$name])->save();
        }

        Alert::success('บันทึกข้อมูลสำเร็จ');
        return redirect()->route('setting.index');
    }
}