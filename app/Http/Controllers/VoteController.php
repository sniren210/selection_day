<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    protected $validasi = [
        'candidate_id' => ['required'],
        'user_id' => ['required'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        if (app('auth')->user()->vote) {
            return view('vote', $data);
        }
        return view('vote_finish', $data);
    }

    public function user()
    {
        $data = [
            'user' => User::whereNotNull('user_verified_at')->get(),
        ];

        return view('vote.table_user', $data);
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
            'candidate' => Candidate::all(),
        ];

        return view('vote.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        Candidate::create([
            'candidate_id' => $request->candidate,
            'user_id' => app('auth')->user()->id,
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
            'user' => User::all(),
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
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        $request->validate(
            $this->validasi,
            $this->messages
        );

        vote::where('id', $vote->id)->update([
            'candidate_id' => $request->candidate_id,
            'user_id' => $request->user_id,
        ]);

        return redirect(
            'vote'
        )->with('status', 'vote berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        vote::destroy($vote->id);
        return redirect('vote')->with('status', 'vote berhasil dihapus.');
    }
}
