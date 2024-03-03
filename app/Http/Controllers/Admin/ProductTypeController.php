<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = ProductType::all();
            return DataTables::make($data)
                ->addIndexColumn()

                ->addColumn('btn',function ($data){
                    $btnEdit = (Auth::user()->hasAnyPermission(['*', 'all product_type', 'edit product_type']) ? '<a class="btn btn-sm btn-warning" onclick="editData(`'.url('product_type/edit') . '/' . $data['id'].'`)"><i class="fa fa-pen" data-toggle="tooltip" title="แก้ไข"></i></a>' : '');
                    $btnDel = (Auth::user()->hasAnyPermission(['*', 'all product_type', 'delete product_type']) ? '<button class="btn btn-sm btn-danger" onclick="confirmdelete(`'. url('product_type/destroy') . '/' . $data['id'].'`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                    $btn = $btnEdit . ' ' . $btnDel;

                    return $btn;
                })
                ->addColumn('publish',function ($data){
                    if($data['publish']){
                        $publish = '<label class="switch"> <input type="checkbox" checked value="0" id="' . $data['id'] . '" onchange="publish(`'. url('product_type/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                    }else{
                        $publish = '<label class="switch"> <input type="checkbox" value="1" id="'.$data['id'].'" onchange="publish(`'. url('product_type/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                    }
                    if(Auth::user()->hasRole('user')) {
                        $publish = ($data['publish'] ? '<span class="badge badge-success">เผยแพร่</span>' : '<span class="badge badge-danger">ไม่เผยแพร่</span>');
                    }
                    return $publish;
                })
                ->rawColumns(['btn', 'publish', 'img'])
                ->make(true);
        }
        return view('admin.product_type.index');
    }


    public function store(Request $request)
    {
        $status = false;
        $msg = 'ผิดพลาด';

        $product_type = new ProductType();
        $product_type->name = $request->name;
        $product_type->description = $request->description;

        if ($product_type->save()) {
            $status = true;
            $msg = 'บันทึกข้อมูลสำเร็จ';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_type = ProductType::where('id',$id)->first();

        return response()->json(['product_type' => $product_type]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_type = ProductType::where('id',$id)->first();

        return response()->json(['product_type' => $product_type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $product_type = ProductType::whereId($request->id)->first();
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        $product_type->updated_at = Carbon::now();

        if ($product_type->save()) {

            $status = true;
            $msg = 'บันทึกข้อมูลสำเร็จ';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        $msg = 'ผิดพลาด';

        $product_type = ProductType::whereId($id)->first();
        if($product_type->delete()){
            $status = true;
            $msg = 'เสร็จสิ้น';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function publish(string $id)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $product_type = ProdcutType::whereId($id)->first();
        if($product_type->publish == 1) {
            $product_type->publish = 0;
        }else{
            $product_type->publish = 1;
        }

        if($product_type->save()){
            $status = true;
            $msg = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['msg' => $msg, 'status' => $status]);
    }
}
