<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;

class CandidateController extends Controller
{
    protected $validasi = [
        'name' => ['required'],
        'visi' => ['required'],
        'misi' => ['required'],
        'image' => ['required'],
        'fakultas' => ['required'],
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

        return view('candidate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidateRequest $request)
    {
        $request->validate($this->validasi, $this->messages);

        Candidate::create([
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $request->image,
            'fakultas' => $request->fakultas,
        ]);
        return redirect('candidate')->with('status', 'kandidat berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {

        $data = [
            'candidate' => $candidate,
        ];

        return view('candidate.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidateRequest  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $request->validate(
            $this->validasi,
            $this->messages
        );

        Candidate::where('id', $candidate->id)->update([
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $request->image,
            'fakultas' => $request->fakultas,
        ]);

        return redirect(
            'candidate'
        )->with('status', 'kandidat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        Candidate::destroy($candidate->id);
        return redirect('candidate')->with('status', 'kandidat berhasil dihapus.');
    }
}
