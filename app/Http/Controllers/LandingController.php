<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'candidate_BEM' => Candidate::where('jenis', '=', 'BEM')->get(),
            'candidate_DPM' => Candidate::where('jenis', '=', 'DPM')->get(),
            'candidate_HIMA' => Candidate::where('jenis', '=', 'HIMA')->get(),
            'candidate_HIMAKU' => Candidate::where('jenis', '=', 'HIMAKU')->get(),
            // 'candidate' => Candidate::all(),
        ];

        return view('home', $data);
    }

    public function vote()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        return view('vote_start', $data);
    }
}
