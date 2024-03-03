<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Models\User;
use App\Models\UserAddress;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::Where('status','1')
                        ->WhereHas('roles', function($q){
                            $q->where('name', '=' , 'user');
                        })->get();

            return DataTables::make($data)
                ->addIndexColumn()
                ->addColumn('fullname', function ($data) {
                    $fullname = $data['firstname'] . ' ' . $data['lastname'];
                    return $fullname;
                })
                ->addColumn('img', function ($data) {
                    if ($data->getFirstMediaUrl('user')) {
                        $img = '<img src="' . asset($data->getFirstMediaUrl('user')) . '" style="width: auto; height: 40px;">';
                    } else {
                        $img = '<img src="' . asset('images/no-image.jpg') . '" style="width: auto; height: 40px;">';
                    }
                    return $img;
                })
                ->addColumn('phone', function ($data){
                    $phone = "<a href='tel:".$data['phone']."'>".$data['phone']."</a>";
                    return $phone;
                })
                ->addColumn('btn', function ($data) {
                    $btnEdit = (Auth::user()->hasAnyPermission(['*', 'member.all', 'member.edit']) ? '<a class="btn btn-sm btn-warning" href="'.route('member.edit', ['member' => $data['slug']]).'"><i class="fa fa-pen" data-toggle="tooltip" title="แก้ไข"></i> แก้ไข</a>' : '');
                    $btnDel = (Auth::user()->hasAnyPermission(['*', 'member.all', 'member.destroy']) ? '<button class="btn btn-sm btn-danger" onclick="confirmdelete(`' . url('admin/user/destroy') . '/' . $data['id'] . '`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                    $btn = $btnEdit;

                    return $btn;
                })

                ->addColumn('created_at', function($data){
                    $created_at = Carbon::parse($data['created_at'])->format('d/m/Y');

                    return $created_at;
                })

                // ->addColumn('status',function ($data){
                //     if($data['status']){
                //         $status = '<label class="switch"> <input type="checkbox" checked value="0" id="' . $data['id'] . '" onchange="publish(`'. url('admin/member/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                //     }else{
                //         $status = '<label class="switch"> <input type="checkbox" value="1" id="'.$data['id'].'" onchange="publish(`'. url('admin/member/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                //     }

                //     if(Auth::user()->id == $data['id']){
                //         $status = '';
                //     }

                //     return $status;
                // })
                ->rawColumns(['btn', 'img', 'fullname', 'phone', 'created_at'])
                ->make(true);
        }

        return view('admin.member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $member)
    {
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::whereId($id)->first();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->line_id = $request->line_id;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }

        $user->updated_at = Carbon::now();

        if ($user->save()) {
            if ($request->file('img')) {
                $medias = $user->getMedia('user');
                if (count($medias) > 0) {
                    foreach ($medias as $media) {
                        $media->delete();
                    }
                }

                $getImage = $request->img;
                $path = storage_path('app/public');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $img = Image::make($getImage->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public') . '/' . $getImage->getClientOriginalName());

                $user->addMedia(storage_path('app/public') . '/' . $getImage->getClientOriginalName())->toMediaCollection('user');
            }

            $address = UserAddress::where('user_id',$user->id)->first();
            $address->address = $request->address;
            $address->province = $request->province;
            $address->amphoe = $request->amphoe;
            $address->district = $request->district;
            $address->zipcode = $request->zipcode;

            if($address->save()) {
                Alert::success('บันทึกข้อมูล');
                return redirect()->route('member.index');
            }
        }

        Alert::error('ผิดพลาด', 'ไม่สามารถบันทึกข้อมูลได้');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $user = User::whereId($id)->first();
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        if ($user->save()) {
            $status = true;
            $msg = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['msg' => $msg, 'status' => $status]);
    }

    public function publish($id)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $user = User::whereId($id)->first();
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        if ($user->save()) {
            $status = true;
            $msg = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['msg' => $msg, 'status' => $status]);
    }
}