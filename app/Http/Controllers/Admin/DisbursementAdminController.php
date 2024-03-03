<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

use App\Models\Disbursement;
use App\Models\DisbursementItem;

class DisbursementAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $data = Disbursement::orderBy('created_at', 'desc');

            return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('btn',function ($data){

                $btn = '';

                if($data['status'] == Disbursement::STATUS_PENDING){
                    $btnShow = (Auth::user()->hasAnyPermission(['*', 'disbursement_detail']) ? '<a class="btn btn-sm btn-info" href="'.url('disbursement_admin/show').'/' . $data['id'].'"><i class="fa fa-magnifying-glass" data-toggle="tooltip" title="ลบข้อมูล"></i></a>' : '');
                    $btnApproval = (Auth::user()->hasAnyPermission(['*', 'disbursement_approve']) ? '<a class="btn btn-sm btn-success" onclick="approveDisbursement(`'.url('disbursement_admin/approve') . '/' . $data['id'].'`)"><i class="fa fa-check" data-toggle="tooltip" title="แก้ไข"></i></a>' : '');
                    $btnRejection = (Auth::user()->hasAnyPermission(['*', 'disbursement_approve']) ? '<button class="btn btn-sm btn-danger" onclick="rejectDisbursement(`'. url('disbursement_admin/reject') . '/' . $data['id'].'`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                    $btn = $btnShow. ' ' .$btnApproval . ' ' . $btnRejection;
                }

                return $btn;
            })
            ->addColumn('date',function ($data){
                $date = Carbon::parse($data['created_at'])->format('d/m/Y');
                return $date;
            })
            ->addColumn('employee_code', function($data){
                $employee_code = $data->createBy->user_code;
                return $employee_code;
            })
            ->addColumn('employee_name', function($data){
                $employee_name = $data->createBy->firstname . ' ' . $data->createBy->lastname;
                return $employee_name;
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
            ->rawColumns(['btn','status','date', 'employee_code', 'employee_name'])
            ->make(true);
        }

        return view('admin.disbursement_admin.index');
    }

    public function DisbursementApproval($id) {
        $status = false;
        $msg = 'ผิดพลาด ไม่สามารถอนุมัติรายการได้';

        $disbursement = Disbursement::whereId($id)->first();
        $disbursement->status = Disbursement::STATUS_APPROVED;
        $disbursement->approved_by = Auth::user()->id;

        if($disbursement->save()) {
            $status = true;
            $msg = 'อนุมัติรายการเรียบร้อยแล้ว';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function DisbursementRejection($id) {
        $status = false;
        $msg = 'ผิดพลาด ไม่สามารถยกเลิกรายการได้';

        $disbursement = Disbursement::whereId($id)->first();
        $disbursement->status = Disbursement::STATUS_EJECT;
        $disbursement->approved_by = Auth::user()->id;

        if($disbursement->save()) {
            $status = true;
            $msg = 'ยกเลิกรายการเรียบร้อยแล้ว';
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function show(string $id)
    {
        $disbursement = Disbursement::whereId($id)->first();
        $disbursement_items = DisbursementItem::where('disbursement_id',$disbursement->id)->with('product')->get();
        // dd($disbursement_items);

        return view('admin.disbursement_admin.show',compact('disbursement','disbursement_items'));
    }

}
