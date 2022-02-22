<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function vote()
    {
        $data = [
            'candidate' => Candidate::all(),
        ];

        return view('vote_start', $data);
    }
}
