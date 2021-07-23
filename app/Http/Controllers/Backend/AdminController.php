<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('backend/pages/admin/index',[
            'active' => 'admin',
            'admin' => $admin,
        ]);
    }

    public function create()
    {
        return view('backend/pages/admin/form',[
            'active' => 'admin',
            'url' => 'admin',
        ]);
    }

    public function store(Request $request, Admin $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'         => 'required',
            'admin_username'         => 'required|unique:tb_admin,admin_username',
            'admin_password'         => 'required',
            'admin_notelp'         => 'required|numeric',
            'admin_alamat'         => 'required',
            'admin_level'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        }

        $admin->admin_nama = $request->input('admin_nama');
        $admin->admin_username = $request->input('admin_username');
        $admin->admin_password = Hash::make($request->input('admin_password'));
        $admin->admin_notelp = $request->input('admin_notelp');
        $admin->admin_alamat = $request->input('admin_alamat');
        $admin->admin_level = $request->input('admin_level');
        $admin->save();

        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(Admin $admin)
    {
        return view(
            'backend/pages/admin/form',
            [
                'active' => 'admin',
                'admin' => $admin,
                'url' => 'admin.update',
            ]
        );
    }

    public function update(Request $request, Admin $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'         => 'required',
            'admin_username'         => [
                                        'required', 
                                        Rule::unique('tb_admin')->ignore($admin->admin_id,'admin_id')
                                    ],
            'admin_notelp'         => 'required|numeric',
            'admin_alamat'         => 'required',
            'admin_level'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.update', $admin->admin_id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('admin_password') != null) {
            $password = $request->input('admin_password');
            $pwd = Hash::make($password);
            $admin->admin_password = $pwd;
        }
        

        $admin->admin_nama = $request->input('admin_nama');
        $admin->admin_username = $request->input('admin_username');
        $admin->admin_notelp = $request->input('admin_notelp');
        $admin->admin_alamat = $request->input('admin_alamat');
        $admin->admin_level = $request->input('admin_level');
        $admin->save();
        
        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(Admin $admin)
    {
        $admin->forceDelete();

        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil dihapus');
    }
}
