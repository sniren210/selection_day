<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use App\Notifications\DeniedNotification;
use App\Notifications\VerifyNotification;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->level <= 1) {
                return redirect('/dashboard');
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::all(),
        ];

        return view('user.table', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verified()
    {
        $data = [
            'user' => User::where('level', '=', '0')->get(),
        ];

        return view('user.table_verified', $data);
    }

    public function verify(Request $request, User $user)
    {

        $user->notify(new VerifyNotification($user));

        user::where('id', $user->id)->update([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'user_verified_at' => date('Y-m-d h:i:s'),
            'ktn' => $user->ktn,
            'selfi' => $user->selfi,
        ]);

        return redirect('user-verified')->with('status', 'user berhasil di verifikasi.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' => User::all(),
        ];

        return view('user.add', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = [
            'user' => $user,
        ];

        return view('user.detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        if ($request->ktn) {

            if ($request->ktn->originalName = 'default.png') {
                $request->ktn->originalName =
                    time() . '_' . $request->ktn->getClientOriginalName();
                $request->ktn->move(
                    'img/ktn',
                    $request->ktn->originalName
                );
            } else {

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
                $request->selfi->originalName =
                    time() . '_' . $request->selfi->getClientOriginalName();

                $request->selfi->move(
                    'img/profile',
                    $request->selfi->originalName
                );
            }
        }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'password' => Hash::make($request->password),
            'ktn' =>  $request->ktn->originalName,
            'selfi' =>  $request->selfi->originalName,
            'level' => $request->level,
        ]);
        return redirect('user')->with('status', 'user berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'user' => $user,
        ];

        return view('user.edit', $data);
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
            'user'
        )->with('status', 'user berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        user::destroy($user->id);
        Vote::where('user_id', '=', $user->id)->delete();

        return redirect('user')->with('status', 'user berhasil dihapus.');
    }

    public function denied(User $user)
    {
        user::destroy($user->id);
        Vote::where('user_id', '=', $user->id)->delete();

        $user->notify(new DeniedNotification($user));

        return redirect('user-verified')->with('status', 'user dengan email ' . $user->email . ' berhasil di tolak.');
    }
}
