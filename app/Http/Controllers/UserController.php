<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $validasi = [
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['required'],
        'user_verified_at' => ['required'],
        'ktn' => ['required'],
        'selfi' => ['required'],
        'vote_id' => ['required'],
    ];
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

        Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_verified_at' => $request->user_verified_at,
            'ktn' => $request->ktn,
            'selfi' => $request->selfi,
            'vote_id' => $request->vote_id,
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
            $this->validasi,
            $this->messages
        );

        user::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_verified_at' => $request->user_verified_at,
            'ktn' => $request->ktn,
            'selfi' => $request->selfi,
            'vote_id' => $request->vote_id,
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
        return redirect('user')->with('status', 'user berhasil dihapus.');
    }
}
