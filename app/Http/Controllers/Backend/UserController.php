<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserModel;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        return view('backend/pages/user/index',[
            'active' => 'user',
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('backend/pages/user/form',[
            'active' => 'user',
            'url' => 'user',
        ]);
    }

    public function store(Request $request, UserModel $user)
    {
        $validator = Validator::make($request->all(), [
            'user_nama'         => 'required',
            'user_username'         => 'required|unique:tb_user,user_username',
            'user_password'         => 'required',
            'user_notelp'         => 'required|numeric',
            'user_alamat'         => 'required',
            'user_level'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user->user_nama = $request->input('user_nama');
        $user->user_username = $request->input('user_username');
        $user->user_password = Hash::make($request->input('user_password'));
        $user->user_notelp = $request->input('user_notelp');
        $user->user_alamat = $request->input('user_alamat');
        $user->user_level = $request->input('user_level');
        $user->save();

        return redirect()
            ->route('user')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(user $user)
    {
        return view(
            'backend/pages/user/form',
            [
                'active' => 'user',
                'user' => $user,
                'url' => 'user.update',
            ]
        );
    }

    public function update(Request $request, UserModel $user)
    {
        $validator = Validator::make($request->all(), [
            'user_nama'         => 'required',
            'user_username'         => [
                                        'required', 
                                        Rule::unique('tb_user')->ignore($user->user_id,'user_id')
                                    ],
            'user_notelp'         => 'required|numeric',
            'user_alamat'         => 'required',
            'user_level'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.update', $user->user_id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('user_password') != null) {
            $password = $request->input('user_password');
            $pwd = Hash::make($password);
            $user->user_password = $pwd;
        }
        

        $user->user_nama = $request->input('user_nama');
        $user->user_username = $request->input('user_username');
        $user->user_notelp = $request->input('user_notelp');
        $user->user_alamat = $request->input('user_alamat');
        $user->user_level = $request->input('user_level');
        $user->save();
        
        return redirect()
            ->route('user')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(UserModel $user)
    {
        $user->forceDelete();

        return redirect()
            ->route('user')
            ->with('message', 'Data berhasil dihapus');
    }
}
