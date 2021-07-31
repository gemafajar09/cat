<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TokenModel;
use DB;

class TokenController extends Controller
{
    public function index()
    {
        $token = TokenModel::all();

        return view('backend/pages/token/index',[
            'active' => 'token',
            'token' => $token,
        ]);
    }

    public function create()
    {
        return view('backend/pages/token/form',[
            'active' => 'token',
            'url' => 'token',
        ]);
    }

    public function store(Request $request, TokenModel $token)
    {
        $validator = Validator::make($request->all(), [
            'token_tanggal'         => 'required',
            'token_jam'         => 'required',
            'token_key'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('token.create')
                ->withErrors($validator)
                ->withInput();
        }

        $token->token_tanggal = $request->input('token_tanggal');
        $token->token_jam = $request->input('token_jam');
        $token->token_key = $request->input('token_key');
        $token->save();

        return redirect()
            ->route('token')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(TokenModel $token)
    {
        return view(
            'backend/pages/token/form',
            [
                'active' => 'token',
                'url' => 'token.update',
                'token' => $token,
            ]
        );
    }

    public function update(Request $request, TokenModel $token)
    {
        $validator = Validator::make($request->all(), [
            'token_tanggal'         => 'required',
            'token_jam'         => 'required',
            'token_key'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('token.update', $token->token_id)
                ->withErrors($validator)
                ->withInput();
        }

        $token->token_tanggal = $request->input('token_tanggal');
        $token->token_jam = $request->input('token_jam');
        $token->token_key = $request->input('token_key');
        $token->save();

        return redirect()
            ->route('token')
            ->with('message', 'Data berhasil diedit');
    
    }

    public function destroy(TokenModel $token)
    {

        $token->forceDelete();

        return redirect()
            ->route('token')
            ->with('message', 'Data berhasil dihapus');
    }
}
