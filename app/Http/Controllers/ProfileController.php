<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string'],
        'email' => ['required', 'string', 'unique:users,email'],
        'password' => ['required', 'confirmed', 'string'],
        'ktn' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        'selfi' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
    ];

    protected $validasiEdit = [
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['confirmed'],
        'ktn' => ['file', 'image', 'mimes:jpeg,png,jpg'],
        'selfi' => ['file', 'image', 'mimes:jpeg,png,jpg'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => auth()->user(),
        ];

        return view('profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = [
            'user' => app('auth')->user(),
        ];

        return view('profile_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            $this->validasiEdit,
            $this->messages
        );

        if ($request->ktn) {

            if ($request->ktn->originalName = 'default.png') {
                $request->ktn->originalName =
                    time() . '_' . $request->ktn->getClientOriginalName();

                $request->ktn->move(
                    'img/ktn',
                    $request->ktn->originalName
                );
            } else {
                File::delete('img/ktn/' . $user->ktn->originalName);

                $request->ktn->originalName =
                    time() . '_' . $request->ktn->getClientOriginalName();

                $request->ktn->move(
                    'img/ktn',
                    $request->ktn->originalName
                );
            }
        }

        if ($request->selfi) {

            if ($request->selfi->originalName = 'default.png') {
                $request->selfi->originalName =
                    time() . '_' . $request->selfi->getClientOriginalName();

                $request->selfi->move(
                    'img/profile',
                    $request->selfi->originalName
                );
            } else {
                File::delete('img/profile/' . $user->selfi->originalName);

                $request->selfi->originalName =
                    time() . '_' . $request->selfi->getClientOriginalName();

                $request->selfi->move(
                    'img/profile',
                    $request->selfi->originalName
                );
            }
        }

        User::where('id', $user->id)->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ?? Hash::make($request->password),
            'user_verified_at' => $user->user_verified_at,
            'ktn' => $request->ktn->originalName ?? $user->ktn,
            'selfi' =>  $request->selfi->originalName ?? $user->selfi,
            'level' => $request->level,
        ]);

        return redirect(
            '/user/show'
        )->with('status', 'user berhasil diubah.');
    }
}
