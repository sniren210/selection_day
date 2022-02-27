<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'user' => User::all(),
            // 'candidate' => Candidate::all(),
            'candidate_BEM' => Candidate::where('jenis', '=', 'BEM')->get(),
            'candidate_DPM' => Candidate::where('jenis', '=', 'DPM')->get(),
            'candidate_HIMA' => Candidate::where('jenis', '=', 'HIMA')->get(),
            'candidate_HIMAKU' => Candidate::where('jenis', '=', 'HIMAKU')->get(),
            'not_vote' => User::whereNotNull('user_verified_at')->get(),
            'vote_BEM' => [],
            'vote_DPM' => [],
            'vote_HIMA' => [],
            'vote_HIMAKU' => [],
        ];

        foreach (Vote::all() as $value) {
            if ($value->candidate->jenis == 'BEM') {
                array_push($data['vote_BEM'], $value);
            } else if ($value->candidate->jenis == 'DPM') {
                array_push($data['vote_DPM'], $value);
            } else if ($value->candidate->jenis == 'HIMA') {
                array_push($data['vote_HIMA'], $value);
            } else if ($value->candidate->jenis == 'HIMAKU') {
                dd($value);
                array_push($data['vote_HIMAKU'], $value);
            }
        }

        $data['percentage_BEM'] = $this->percentage($data['vote_BEM'], $data['candidate_BEM']);
        $data['percentage_DPM'] = $this->percentage($data['vote_DPM'], $data['candidate_DPM']);
        $data['percentage_HIMA'] = $this->percentage($data['vote_HIMA'], $data['candidate_HIMA']);
        $data['percentage_HIMAKU'] = $this->percentage($data['vote_HIMAKU'], $data['candidate_HIMAKU']);


        return view('dashboard', $data);
    }

    public function percentage($vote,  $candidate)
    {
        $percentage = [];
        $length = count($vote);

        foreach ($candidate as $key => $value) {
            array_push($percentage, $length != 0 ? round((count($value->vote) / $length) * 100) : 0);
        }

        return $percentage;
    }

    public function vote()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        return view('vote', $data);
    }
}
