<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string'],
        'visi' => ['required', 'string'],
        'misi' => ['required', 'string'],
        'fakultas' => ['required', 'string'],
        'jurusan' => ['required', 'string'],
        'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
    ];

    protected $validasiEdit = [
        'name' => ['required', 'string'],
        'visi' => ['required', 'string'],
        'misi' => ['required', 'string'],
        'fakultas' => ['required', 'string'],
        'jurusan' => ['required', 'string'],
        'image' => ['file', 'image', 'mimes:jpeg,png,jpg'],
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

        return view('candidate.table', $data);
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
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $data = [
            'candidate' => $candidate,
        ];

        return view('candidate.detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        if ($request->image) {

            if ($request->image->originalName = 'default.png') {
                $request->image->originalName =
                    time() . '_' . $request->image->getClientOriginalName();

                $request->image->move(
                    'img/candidate',
                    $request->image->originalName
                );
            } else {

                $request->image->originalName =
                    time() . '_' . $request->image->getClientOriginalName();

                $request->image->move(
                    'img/candidate',
                    $request->image->originalName
                );
            }
        }

        Candidate::create([
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' =>  $request->image->originalName,
            'jurusan' => $request->jurusan,
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
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate(
            $this->validasiEdit,
            $this->messages
        );

        if ($request->image) {

            if ($request->image->originalName = 'default.png') {
                $request->image->originalName =
                    time() . '_' . $request->image->getClientOriginalName();

                $request->image->move(
                    'img/candidate',
                    $request->image->originalName
                );
            } else {
                File::delete('img/candidate/' . $candidate->image->originalName);

                $request->image->originalName =
                    time() . '_' . $request->image->getClientOriginalName();

                $request->image->move(
                    'img/candidate',
                    $request->image->originalName
                );
            }
        }

        Candidate::where('id', $candidate->id)->update([
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' =>  $request->image->originalName ?? $candidate->image,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
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
