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
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product_types = ProductType::all();
        if($request->ajax()){
            $data = Product::all();
            return DataTables::make($data)
                ->addIndexColumn()

                ->addColumn('btn',function ($data){
                    $btnEdit = (Auth::user()->hasAnyPermission(['*', 'all product', 'edit product']) ? '<a class="btn btn-sm btn-warning" onclick="editData(`'.url('product/edit') . '/' . $data['id'].'`)"><i class="fa fa-pen" data-toggle="tooltip" title="แก้ไข"></i></a>' : '');
                    $btnDel = (Auth::user()->hasAnyPermission(['*', 'all product', 'delete product']) ? '<button class="btn btn-sm btn-danger" onclick="confirmdelete(`'. url('product/destroy') . '/' . $data['id'].'`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                    $btn = $btnEdit . ' ' . $btnDel;

                    return $btn;
                })
                ->addColumn('publish',function ($data){
                    if($data['publish']){
                        $publish = '<label class="switch"> <input type="checkbox" checked value="0" id="' . $data['id'] . '" onchange="publish(`'. url('product/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                    }else{
                        $publish = '<label class="switch"> <input type="checkbox" value="1" id="'.$data['id'].'" onchange="publish(`'. url('product/publish') . '/' . $data['id'].'`)"> <span class="slider round"></span> </label>';
                    }
                    if(Auth::user()->hasRole('user')) {
                        $publish = ($data['publish'] ? '<span class="badge badge-success">เผยแพร่</span>' : '<span class="badge badge-danger">ไม่เผยแพร่</span>');
                    }
                    return $publish;
                })
                ->rawColumns(['btn', 'publish'])
                ->make(true);
        }
        return view('admin.product.index',compact('product_types'));
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
        $status = false;
        $msg = 'ผิดพลาด';

        //pattern
        $config = [
            'table' => 'products',
            'field' => 'product_code',
            'length' => 10,
            'prefix' => 'PO' . date('Y') . date('m'),
            'reset_on_prefix_change' => true,
        ];
        // now use it

        $product_code = IdGenerator::generate($config);

        $product = new Product();
        $product->product_code = $product_code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->limit = $request->limit;
        $product->product_type_id = $request->product_type_id;

        if ($product->save()) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id',$id)->first();

        return response()->json(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $product = Product::whereId($request->id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->limit = $request->limit;
        $product->product_type_id = $request->product_type_id;
        $product->updated_at = Carbon::now();

        if ($product->save()) {

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

        $product = Product::whereId($id)->first();
        if($product->delete()){
            $status = true;
            $msg = 'เสร็จสิ้น';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function publish(string $id)
    {
        $status = false;
        $msg = 'บันทึกข้อมูลผิดพลาด';

        $product = Product::whereId($id)->first();
        if($product->publish == 1) {
            $product->publish = 0;
        }else{
            $product->publish = 1;
        }

        if($product->save()){
            $status = true;
            $msg = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['msg' => $msg, 'status' => $status]);
    }
}
