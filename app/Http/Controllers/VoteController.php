<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Candidate;
use App\Models\User;
use App\Notifications\CancelNotification;
use App\Notifications\VoteNotification;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    protected $validasi = [
        'candidate' => ['required'],
    ];
    protected $validasiEdit = [
        'BEM' => ['required'],
        'DPM' => ['required'],
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

        if (app('auth')->user()->vote == 3) {
            return view('vote_finish');
        }

        if (app('auth')->user()->vote == 2 && app('auth')->user()->jurusan == 'ICT') {
            return view('vote_finish');
        }

        if (!app('auth')->user()->vote) {
            $data = [
                'candidate' => Candidate::where('jenis', '=', 'BEM')->get(),
                'teks' => 'Pilih Kandidat BEM FEB',
            ];
        } else if (app('auth')->user()->vote == 1) {
            $data = [
                'candidate' => Candidate::where('jenis', '=', 'DPM')->get(),
                'teks' => 'Pilih Kandidat DPM FEB',
            ];
        } else if (app('auth')->user()->vote == 2) {
            if (app('auth')->user()->jurusan == 'MBTI') {
                $data = [
                    'candidate' => Candidate::where('jenis', '=', 'HIMA')->get(),
                    'teks' => 'Pilih Kandidat HIMA MBTI',

                ];
            } else if (app('auth')->user()->jurusan == 'Akuntansi') {
                $data = [
                    'candidate' => Candidate::where('jenis', '=', 'HIMAKU')->get(),
                    'teks' => 'Pilih Kandidat HIMAKU',

                ];
            }
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

        $request->validate(
            $this->validasi,
            $this->messages
        );

        $res = Vote::create([
            'candidate_id' => $request->candidate,
            'user_id' => app('auth')->user()->id,
        ]);

        if (!app('auth')->user()->vote) {
            $res = app('auth')->user()->update([
                'vote' => 1
            ]);
        } else if (app('auth')->user()->vote == 1) {
            app('auth')->user()->update([
                'vote' => 2
            ]);
        } else if (app('auth')->user()->vote == 2) {
            app('auth')->user()->update([
                'vote' => 3
            ]);
        }

        return redirect('vote')->with('status', 'vote berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (app('auth')->user()->level <= 2) {
            return redirect(
                'vote-user'
            );
        }

        // dd($user->vote_candidate[0]->candidate);

        $data = [
            'candidate_DPM' => Candidate::where('jenis', '=', 'DPM')->get(),
            'candidate_BEM' => Candidate::where('jenis', '=', 'BEM')->get(),
            'user' => $user,
        ];

        foreach ($user->vote_candidate as $value) {
            if ($value->candidate->jenis == 'BEM') {
                $data['BEM'] = $value;
            } else if ($value->candidate->jenis == 'DPM') {
                $data['DPM'] = $value;
            } else if ($value->candidate->jenis == 'HIMA') {
                $data['HIMA'] = $value;
                $data['candidate_HIMA'] = Candidate::where('jenis', '=', 'HIMA')->get();
            } else if ($value->candidate->jenis == 'HIMAKU') {
                $data['HIMAKU'] = $value;
                $data['candidate_HIMAKU'] = Candidate::where('jenis', '=', 'HIMAKU')->get();
            }
        }

        return view('vote.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoteRequest  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            $this->validasiEdit,
            $this->messages
        );

        foreach ($user->vote_candidate as $value) {
            if ($value->candidate->jenis == 'BEM') {
                $a = Vote::where('id', $value->id)->update([
                    'candidate_id' => $request->BEM,
                    'user_id' =>  $user->id,
                ]);
            } else if ($value->candidate->jenis == 'DPM') {
                $b = Vote::where('id', $value->id)->update([
                    'candidate_id' => $request->DPM,
                    'user_id' =>  $user->id,
                ]);
            } else if ($value->candidate->jenis == 'HIMA') {
                if (isset($request->HIMA)) {
                    $c =  Vote::where('id', $value->id)->update([
                        'candidate_id' => $request->HIMA,
                        'user_id' =>  $user->id,
                    ]);
                }
            } else if ($value->candidate->jenis == 'HIMAKU') {
                if (isset($request->HIMAKU)) {
                    $d = Vote::where('id', $value->id)->update([
                        'candidate_id' => $request->HIMAKU,
                        'user_id' =>  $user->id,
                    ]);
                }
            }
        }



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
    public function destroy(User $user)
    {
        vote::where('user_id', '=', $user->id)->delete();

        User::where('id', $user->id)->update([
            'vote' => null,
        ]);

        $user->notify(new CancelNotification($user));

        return redirect('vote-user')->with('status', 'vote berhasil dicancel.');
    }

    public function notifikasi(User $user)
    {
        $user->notify(new VoteNotification($user));

        return redirect('vote-user')->with('status', 'berhasil memperingatkan user.');
    }
}
