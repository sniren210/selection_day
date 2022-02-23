<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Candidate;
use App\Models\User;
use App\Notifications\VoteNotification;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    protected $validasi = [
        'candidate' => ['required'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::whereNotNull('user_verified_at')->get(),
        ];

        return view('vote.table_user', $data);
    }

    public function vote()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        if (app('auth')->user()->vote) {
            return view('vote_finish', $data);
        }
        return view('vote', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function vote_store(Request $request)
    {


        $res = Vote::create([
            'candidate_id' => $request->candidate,
            'user_id' => app('auth')->user()->id,
        ]);

        app('auth')->user()->update([
            'vote_id' => $res->id
        ]);

        return redirect('vote')->with('status', 'vote berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        $data = [
            'vote' => $vote,
            'candidate' => Candidate::all(),
        ];

        return view('vote.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoteRequest  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        $request->validate(
            $this->validasi,
            $this->messages
        );

        Vote::where('id', $vote->id)->update([
            'candidate_id' => $request->candidate,
            'user_id' =>  app('auth')->user()->id,
        ]);

        return redirect(
            'vote-user'
        )->with('status', 'vote berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $vote)
    {
        vote::destroy($vote);

        app('auth')->user()->update([
            'vote_id' => null
        ]);

        return redirect('vote-user')->with('status', 'vote berhasil dicancel.');
    }

    public function notifikasi(User $user)
    {
        $user->notify(new VoteNotification($user));

        return redirect('vote-user')->with('status', 'berhasil memperingatkan user.');
    }
}
