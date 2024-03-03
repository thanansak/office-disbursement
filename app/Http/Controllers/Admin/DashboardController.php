<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use PDO;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Disbursement;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user_total = User::WhereHas('roles', function($q){ $q->where('name', '!=', 'developer'); })->count();
        $disbursements = Disbursement::count();
        $disbursement_pending = Disbursement::where('status', Disbursement::STATUS_PENDING)->count();
        $disbursement_approved = Disbursement::where('status', Disbursement::STATUS_APPROVED)->count();

        if(Auth::user()->hasRole('user')) {
            $disbursements = Disbursement::where('created_by', Auth::user()->id)->count();
            $disbursement_pending = Disbursement::where('created_by', Auth::user()->id)->where('status', Disbursement::STATUS_PENDING)->count();
            $disbursement_approved = Disbursement::where('created_by', Auth::user()->id)->where('status', Disbursement::STATUS_APPROVED)->count();
        };

        return view('admin.dashboard', compact('user_total', 'disbursements', 'disbursement_pending', 'disbursement_approved'));
    }
}