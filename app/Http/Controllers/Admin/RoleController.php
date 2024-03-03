<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Role::all();

            if(!Auth::user()->hasRole('developer')) {
                $data = Role::where('name','!=','developer')->get();
            }

            return DataTables::make($data)
                ->addIndexColumn()
                ->addColumn('btn',function ($data){
                    $btnEdit = (Auth::user()->hasAnyPermission(['*', 'all role', 'edit role']) ? '<a class="btn btn-sm btn-warning" onclick="editData(`'.url('role/edit') . '/' . $data['id'].'`)"><i class="fa fa-pen" data-toggle="tooltip" title="แก้ไข"></i></a>' : '');
                    $btnDel = (Auth::user()->hasAnyPermission(['*', 'all role', 'destroy role']) ? '<button class="btn btn-sm btn-danger" onclick="confirmdelete(`'. url('role/destroy') . '/' . $data['id'].'`)"><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>' : '');

                    if(in_array($data['name'],['developer', 'superadmin', 'admin', 'employee'])){
                        $btnDel = '<button class="btn btn-sm btn-danger" disabled><i class="fa fa-trash" data-toggle="tooltip" title="ลบข้อมูล"></i></button>';
                    }

                    $btn = $btnEdit . ' ' . $btnDel;

                    return $btn;
                })
                ->rawColumns(['btn'])
                ->make(true);
        }

        $permissions = Permission::all();

        if(!Auth::user()->hasRole('developer')) {
            $permissions = Permission::where('name','!=','*')->get();
        }

        return view('admin.role.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $status = false;
        $msg = 'ผิดพลาด';

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->guard_name = 'web';
        $role->created_at = Carbon::now();
        if($role->save()){

            $permission = explode(',',$request->permission);
            $role->syncPermissions($permission);

            $status = true;
            $msg = 'บันทึกข้อมูลสำเร็จ';
        }
        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function edit($id)
    {
        $role = Role::whereId($id)->first();
        $permissions = $role->permissions;
        return response()->json(['role' => $role,'permissions' => $permissions]);
    }

    public function update(Request $request)
    {
        $status = false;
        $msg = 'ผิดพลาด';

        $role = Role::whereId($request->id)->first();
        $role->name = $request->name;
        $role->description = $request->description;

        $role->updated_at = Carbon::now();

        if($role->save()){

            $permission = explode(',',$request->permission);
            $role->syncPermissions($permission);

            $status = true;
            $msg = 'บันทึกข้อมูลสำเร็จ';
        }

       return response()->json(['status' => $status, 'msg' => $msg]);
    }

    public function destroy($id)
    {
        $status = false;
        $msg = 'ไม่สามารถลบข้อมูลได้';

        $role = Role::whereId($id)->first();
        $role->revokePermissionTo($role->getPermissionNames()->toarray());

        if ($role->delete()) {
            $status = true;
            $msg = 'ลบข้อมูลเรียบร้อย';
        }
        return response()->json(['status' => $status, 'msg' => $msg]);
    }
}