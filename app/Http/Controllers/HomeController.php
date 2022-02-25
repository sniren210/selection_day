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
            'candidate' => Candidate::all(),
            'vote' => Vote::all(),
            'not_vote' => User::whereNotNull('user_verified_at')->get(),
        ];

        $percentage = [];
        $length = count($data['vote']);

        foreach ($data['candidate'] as $key => $value) {
            array_push($percentage, round((count($value->vote) / $length) * 100));
        }

        $data['percentage'] = $percentage;

        return view('dashboard', $data);
    }

    public function vote()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        return view('vote', $data);
    }
}
