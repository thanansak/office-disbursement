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
use App\Models\Disbursement;
use App\Models\DisbursementItem;
class DisbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::all();
        if($request->ajax()){

            $data = Disbursement::where('created_by',Auth::user()->id)->get();

            return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('btn',function ($data){
                $btnShow = (Auth::user()->hasAnyPermission(['*', 'all disbursement', 'show disbursement']) ? '<a class="btn btn-sm btn-info" href="'.url('disbursement/show').'/' . $data['id'].'" ><i class="fa fa-magnifying-glass" data-toggle="tooltip" title="ดูรายละเอียด"></i></a>' : '');
                $btnDel = (Auth::user()->hasAnyPermission(['*', 'all disbursement', 'delete disbursement']) ? '<button class="btn btn-sm btn-danger" onclick="confirmdelete(`'. url('disbursement/destroy') . '/' . $data['id'].'`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                $btn = $btnShow . ' ' . $btnDel;

                return $btn;
            })
            ->addColumn('date',function ($data){

                $date = Carbon::parse($data['created_at'])->format('d/m/Y');

                return $date;
            })
            ->addColumn('status', function($data){
                $status = 'error';

                if($data['status'] == Disbursement::STATUS_PENDING){
                    $status = '<span class="badge badge-secondary">รอตรวจสอบ</span>';
                }elseif($data['status'] == Disbursement::STATUS_APPROVED){
                    $status = '<span class="badge badge-success">อนุมัติ</span>';
                }elseif($data['status'] == Disbursement::STATUS_EJECT){
                    $status = '<span class="badge badge-danger">ไม่อนุมัติ</span>';
                }

                return $status;
            })
            ->rawColumns(['btn','status','date'])
            ->make(true);
        }
        return view('admin.disbursement.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.disbursement.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total_price = 0;
        $total_qty = 0;
        foreach ($request->product as $key => $product) {
                $total_price += $request->price[$key] * $request->qty[$key];
                $total_qty += $request->qty[$key];

        }

         //pattern
         $config = [
            'table' => 'disbursements',
            'field' => 'disbursement_code',
            'length' => 10,
            'prefix' => 'D' . date('Y') . date('m'),
            'reset_on_prefix_change' => true,
        ];
        // now use it

        $disbursement_code = IdGenerator::generate($config);

        $disbursement = new Disbursement();
        $disbursement->disbursement_code = $disbursement_code;
        $disbursement->qty = $total_qty;
        $disbursement->total_price = $total_price;
        $disbursement->remark = $request->remark;
        $disbursement->created_by = Auth::user()->id;
        $disbursement->updated_by = Auth::user()->id;

        if($disbursement->save()){
            foreach ($request->product as $key => $value) {
                $disbursement_detail = new DisbursementItem();
                $disbursement_detail->qty = $request->qty[$key];
                $disbursement_detail->unit_price = $request->price[$key];
                $disbursement_detail->total_price = $request->price[$key] * $request->qty[$key];
                $disbursement_detail->product_id = $value;
                $disbursement_detail->disbursement_id = $disbursement->id;

                $disbursement_detail->save();
            }

            Alert::success('สำเร็จ');
            return redirect()->route('disbursement.index');
        }
            Alert::error('ผิดพลาด');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disbursement = Disbursement::whereId($id)->first();
        $disbursement_items = DisbursementItem::where('disbursement_id',$disbursement->id)->with('product')->get();
        // dd($disbursement_items);

        return view('admin.disbursement.show',compact('disbursement','disbursement_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        $msg = 'ผิดพลาด';

        $disbursement = Disbursement::whereId($id)->first();
        if($disbursement->delete()){
            $status = true;
            $msg = 'เสร็จสิ้น';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function getDataProductByid(string $id){
        $product = Product::whereId($id)->first();
        return response()->json(['data' => $product]);
    }


}
