<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->orderBy('id', 'desc')->where('block', 0);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a> '
                        .
                        ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Block</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user');
    }
    public function blocked(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->orderBy('updated_at', 'desc')->where('block', 1);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a> '
                        .
                        ' <a href="javascript:void(0)" class="delete btn btn-success btn-sm">Unblock</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.blocked');
    }
}
